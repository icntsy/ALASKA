<?php

namespace App\Http\Livewire\Drug;

use App\Models\Drug;
use App\Models\DetailNota;
use App\Models\Queue;
use App\Models\Transaction;
use App\Models\DrugBidan;
use Livewire\Component;
use Illuminate\Http\Request;

class Store extends Component
{

    public function store(Request $req, $queue)
    {
        // Untuk mengurangi obat
        $queue = Queue::findOrFail($queue);

        if ($queue->jenis_rawat == NULL) {
             // Jika jenis_rawat kosong, artinya antrian untuk ibu hamil
            $antrian = $queue->pregnantmom;

            // Mendapatkan obat yang terkait dengan ibu hamil
            $drug_bidan = DrugBidan::where("pregnantmom_id", $antrian->id)->get();

            // Mengurangi stok obat yang diberikan kepada ibu hamil
            foreach ($drug_bidan as $item) {
                Drug::where("id", $item["drug_id"])->update([
                    "stok" => $item["drug"]["stok"] - $item["quantity"]
                ]);
            }

        } else {
            // Jika jenis_rawat tidak kosong, artinya antrian untuk pasien lain
            foreach ($queue->medicalrecord->drugs as $drug) {
                Drug::where('id', $drug->pivot->drug_id)->update([
                    'stok' => $drug->stok - $drug->pivot->quantity
                ]);
            }
        }

        // Membuat detail nota berdasarkan request yang diterima
        DetailNota::create([
            "queue_id" => $queue->id,
            "ruangan" => json_encode(["qty" => $req->qty1, "harga" => $req->harga1, "amount" => $req->qty1 * $req->harga1]),
            "assesment" => json_encode(["qty" => $req->qty2, "harga" => $req->harga2, "amount" => $req->qty2 * $req->harga2]),
            "pendaftaran" => json_encode(["qty" => $req->qty3, "harga" => $req->harga3, "amount" => $req->qty3 * $req->harga3]),
            "infus" => json_encode(["qty" => $req->qty4, "harga" => $req->harga4, "amount" => $req->qty4 * $req->harga4]),
            "tindakan" => json_encode(["qty" => $req->qty5, "harga" => $req->harga5, "amount" => $req->qty5 * $req->harga5]),
            "obat" => json_encode(["qty" => $req->qty6, "harga" => $req->harga6, "amount" => $req->qty6 * $req->harga6]),
            "visite" => json_encode(["qty" => $req->qty7, "harga" => $req->harga7, "amount" => $req->qty7 * $req->harga7]),
            "pulang" => json_encode(["qty" => $req->qty8, "harga" => $req->harga8, "amount" => $req->qty8 * $req->harga8]),
            "ekg" => json_encode(["qty" => $req->qty9, "harga" => $req->harga9, "amount" => $req->qty9 * $req->harga9]),
            "darah" => json_encode(["qty" => $req->qty10, "harga" => $req->harga10, "amount" => $req->qty10 * $req->harga10]),
            "fisioterapi" => json_encode(["qty" => $req->qty11, "harga" => $req->harga11, "amount" => $req->qty11 * $req->harga11]),
            "tambahan" => json_encode(["qty" => $req->qty12, "harga" => $req->harga12, "amount" => $req->qty12 * $req->harga12]),
            "disk" => json_encode(["qty" => $req->qty13, "harga" => $req->harga13, "amount" => $req->qty13 * $req->harga13])

        ]);

        // Membuat transaksi dengan informasi antrian dan pembayaran yang diterima
        Transaction::create([
            'queue_id' => $queue->id,
            'payment' => $req->payment,
            'tagihan' => $req->tagihan
        ]);

        return redirect("/antri/obat");
    }
}
