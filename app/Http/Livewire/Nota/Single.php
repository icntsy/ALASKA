<?php

namespace App\Http\Livewire\Nota;

use Dompdf\Dompdf;
use App\Models\Queue;
use App\Models\Transaction;
use App\Models\DetailNota;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PDF;
use Illuminate\Support\Str;

class Single extends Component
{
    public $transaksi;
    public $available;
    public $transaksiIndex;
    public $role;
    public $queue;
    public $jenis_rawat;

    public function mount(Transaction $transaksi, $transaksiIndex){


        $this->transaksi = $transaksi;
        $this->transaksiIndex = $transaksiIndex;
        $this->role = Auth::user()->role; // Inisialisasi $role
        // Mendapatkan $queue dari $transaksi
        $this->queue = $transaksi->queue;
    }

    public function render()
    {

        // Tambahan

        $transaksi = Transaction::find($this->transaksi->id);


        return view('livewire.nota.single', [
            'role' => $this->role // Mengirimkan $role ke tampilan
            ]);
        }

        public function print(Transaction $transaksi)
        {
            $this->queue = $transaksi->queue;
            // Mendapatkan data transaksi untuk dicetak
            $dataTransaksi = $transaksi;
            $dompdf = new Dompdf();

            // Render tampilan view 'livewire.nota.print' dengan data transaksi
            $pdfContent = view('livewire.nota.print', ['transaksi' => $dataTransaksi])->render();



            // Memasukkan konten PDF ke Dompdf
            $dompdf->loadHtml($pdfContent);

            // Mengatur ukuran dan orientasi halaman
            $dompdf->setPaper('A4', 'portrait');

            // Render PDF
            $dompdf->render();

            // Generate nama file PDF yang unik
            $fileName = 'Kwitansi-Rawat-Jalan-' . Str::slug($transaksi->queue->patient->name) . '.pdf';
            // $fileName = 'nota_' . time() . '.pdf';

            // Simpan file PDF di direktori penyimpanan yang diinginkan
            $dompdf->stream($fileName, ['Attachment' => true]);
        }

        public function nota_inap($transaksi_id)
        {

            $transaksi = Transaction::where("id", $transaksi_id)->first();

            $nota = DetailNota::where("queue_id", $transaksi->queue_id)->first();

            $qty_ruangan = json_decode($nota, true);
            $ruangan = json_decode($qty_ruangan["ruangan"], true);
            $assesment = json_decode($qty_ruangan["assesment"], true);
            $pendaftaran = json_decode($qty_ruangan["pendaftaran"], true);
            $infus = json_decode($qty_ruangan["infus"], true);
            $tindakan = json_decode($qty_ruangan["tindakan"], true);
            $obat = json_decode($qty_ruangan["obat"], true);
            $visite = json_decode($qty_ruangan["visite"], true);
            $pulang = json_decode($qty_ruangan["pulang"], true);
            $ekg = json_decode($qty_ruangan["ekg"], true);
            $darah = json_decode($qty_ruangan["darah"], true);
            $fisioterapi = json_decode($qty_ruangan["fisioterapi"], true);
            $tambahan = json_decode($qty_ruangan["tambahan"], true);

            $pdf = PDF::loadView("livewire.nota.download", ["ruangan" => $ruangan, "assesment" => $assesment, "pendaftaran" => $pendaftaran, "infus" => $infus, "tindakan" => $tindakan, "obat" => $obat, "visite" => $visite, "pulang" => $pulang, "ekg" => $ekg, "darah" => $darah, "fisioterapi" => $fisioterapi, "tambahan" => $tambahan, "transaksi" => $transaksi])->setPaper('A4', 'portrait');

            return $pdf->download("Kwitansi-Rawat-Inap-" . Str::slug($transaksi->queue->patient->name) . ".pdf");
            // return $pdf->download("KUITANSI-RAWAT-INAP-". Str::slug($transaksi->queue->patient->name) .".pdf");
            // $template = new \PhpOffice\PhpWord\TemplateProcessor('arsip/nota/nota_inap_new.docx');

            // $transaction = Transaction::get();
            // $nomer = 0;

            // $placeholder = "transaction";
            // $template->cloneRow($placeholder, count($transaction));

            // foreach ($transaction as $row) {
            //     $template->setValue("queue_id", $value);
            // }

            // $file = "E";

            // $template->saveAs($file . '.docx');
            //  return response()->download($file . ".docx")->deleteFileAfterSend(true);
        }

        public function delete(){
            $this->drug->delete();
            $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('Obat Terhapus', ['name' => __('Article') ]) ]);
            $this->emit('articleDeleted');
        }
    }
