<?php

namespace App\Http\Livewire\Drug;

use App\Models\Drug;
use App\Models\Queue;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\View;
use App\Models\DetailNota;

class Process extends Component
{
    public $queue; // Menyimpan data antrian
    public $payment; // Menyimpan nilai pembayaran
    public $tagihan;
    public $qty1; // Menyimpan nilai kuantitas 1
    public $harga1; // Menyimpan nilai harga 1
    public $qty2;
    public $harga2;
    public $qty3;
    public $harga3;
    public $qty4;
    public $harga4;
    public $qty5;
    public $harga5;
    public $qty6;
    public $harga6;
    public $qty7;
    public $harga7;
    public $qty8;
    public $harga8;
    public $qty9;
    public $harga9;
    public $qty10;
    public $harga10;
    public $qty11;
    public $harga11;
    public $qty12;
    public $harga12;
    public $qty13;
    public $harga13;

    protected $rules = [
        'payment' => 'required|numeric',
        'tagihan' => 'required|numeric',
    ];

    public  function mount(Queue $queue){
        $this->queue = $queue;
    }

    public function save()
    {
        // TODO:: Create invoice print function before update!!
        try {
            $this->queue->update([
                "has_drug" => true
                ]);
                foreach ($this->queue->medicalrecord->drugs as $drug) {
                    $drug->decrement('stok',1);
                }
                $this->redirectRoute('queue.drug');
            } catch (\Exception $e) {
                dd($e);
            }
        }


        public function submit()
        {
            $this->validate([
                'qty1' => 'required|numeric',
                'harga1' => 'required|numeric',
                'qty2' => 'required|numeric',
                'harga2' => 'required|numeric',
                'qty3' => 'required|numeric',
                'harga3' => 'required|numeric',
                'qty4' => 'required|numeric',
                'harga4' => 'required|numeric',
                'qty5' => 'required|numeric',
                'harga5' => 'required|numeric',
                'qty6' => 'required|numeric',
                'harga6' => 'required|numeric',
                'qty7' => 'required|numeric',
                'harga7' => 'required|numeric',
                'qty8' => 'required|numeric',
                'harga8' => 'required|numeric',
                'qty9' => 'required|numeric',
                'harga9' => 'required|numeric',
                'qty10' => 'required|numeric',
                'harga10' => 'required|numeric',
                'qty11' => 'required|numeric',
                'harga11' => 'required|numeric',
                'qty12' => 'required|numeric',
                'harga12' => 'required|numeric',
                'qty13' => 'required|numeric',
                'harga13' => 'required|numeric',

                ]);

                $qty1 = $this->qty1;
                $harga1 = $this->harga1;
                $total1 = $qty1 * $harga1;

                $qty2 = $this->qty2;
                $harga2 = $this->harga2;
                $total2 = $qty2 * $harga2;

                $qty3 = $this->qty3;
                $harga3 = $this->harga3;
                $total3 = $qty3 * $harga3;

                $qty4 = $this->qty4;
                $harga4 = $this->harga4;
                $total4 = $qty4 * $harga4;

                $qty5 = $this->qty5;
                $harga5 = $this->harga5;
                $total5 = $qty5 * $harga5;

                $qty6 = $this->qty6;
                $harga6 = $this->harga6;
                $total6 = $qty6 * $harga6;

                $qty7 = $this->qty7;
                $harga7 = $this->harga7;
                $total7 = $qty7 * $harga7;

                $qty8 = $this->qty8;
                $harga8 = $this->harga8;
                $total8 = $qty8 * $harga8;

                $qty9 = $this->qty9;
                $harga9 = $this->harga9;
                $total9 = $qty9 * $harga9;

                $qty10 = $this->qty10;
                $harga10 = $this->harga10;
                $total10 = $qty10 * $harga10;

                $qty11 = $this->qty11;
                $harga11 = $this->harga11;
                $total11 = $qty11 * $harga11;

                $qty12 = $this->qty12;
                $harga12 = $this->harga12;
                $total12 = $qty12 * $harga12;

                $qty13 = $this->qty13;
                $harga13 = $this->harga13;
                $total13 = $qty13 * $harga13;

                $subtotal = 0;

                // Calculate subtotal
                $subtotal += floatval($this->qty1) * floatval($this->harga1);
                $subtotal += floatval($this->qty2) * floatval($this->harga2);
                $subtotal += floatval($this->qty3) * floatval($this->harga3);
                $subtotal += floatval($this->qty4) * floatval($this->harga4);
                $subtotal += floatval($this->qty5) * floatval($this->harga5);
                $subtotal += floatval($this->qty6) * floatval($this->harga6);
                $subtotal += floatval($this->qty7) * floatval($this->harga7);
                $subtotal += floatval($this->qty8) * floatval($this->harga8);
                $subtotal += floatval($this->qty9) * floatval($this->harga9);
                $subtotal += floatval($this->qty10) * floatval($this->harga10);
                $subtotal += floatval($this->qty11) * floatval($this->harga11);
                $subtotal += floatval($this->qty12) * floatval($this->harga12);

                // Add other subtotal calculations here

                $jumlah = $subtotal;

                DetailNota::create([
                    "queue_id" => $this->queue->id,
                    "ruangan" => json_encode(["qty" => $this->qty1, "harga" => $this->harga1, "amount" => $this->qty1 * $this->harga1]),
                    "assesment" => json_encode(["qty" => $this->qty2, "harga" => $this->harga2, "amount" => $this->qty2 * $this->harga2]),
                    "pendaftaran" => json_encode(["qty" => $this->qty3, "harga" => $this->harga3, "amount" => $this->qty3 * $this->harga3]),
                    "infus" => json_encode(["qty" => $this->qty4, "harga" => $this->harga4, "amount" => $this->qty4 * $this->harga4]),
                    "tindakan" => json_encode(["qty" => $this->qty5, "harga" => $this->harga5, "amount" => $this->qty5 * $this->harga5]),
                    "obat" => json_encode(["qty" => $this->qty6, "harga" => $this->harga6, "amount" => $this->qty6 * $this->harga6]),
                    "visite" => json_encode(["qty" => $this->qty7, "harga" => $this->harga7, "amount" => $this->qty7 * $this->harga7]),
                    "pulang" => json_encode(["qty" => $this->qty8, "harga" => $this->harga8, "amount" => $this->qty8 * $this->harga8]),
                    "ekg" => json_encode(["qty" => $this->qty9, "harga" => $this->harga9, "amount" => $this->qty9 * $this->harga9]),
                    "darah" => json_encode(["qty" => $this->qty10, "harga" => $this->harga10, "amount" => $this->qty10 * $this->harga10]),
                    "fisioterapi" => json_encode(["qty" => $this->qty11, "harga" => $this->harga11, "amount" => $this->qty11 * $this->harga11]),
                    "tambahan" => json_encode(["qty" => $this->qty12, "harga" => $this->harga12, "amount" => $this->qty12 * $this->harga12]),
                    "disk" => json_encode(["qty" => $this->qty13, "harga" => $this->harga13, "amount" => $this->qty13 * $this->harga13])


                ]);

                Transaction::create([
                    'queue_id' => $this->queue->id,
                    'payment' => $this->payment,
                    'tagihan' => $this->tagihan
                    ]);

                    $this->redirectRoute('queue.drug');

                    return view('livewire.drug.process', [
                        'queue' => $this->queue,
                        'qty' => $qty,
                        'harga' => $harga,
                        'total' => $total,
                        'total13' => $total13

                        ]);
                    }
                    public function render()
                    {
                        $subtotal = 0;

                        // Calculate subtotal
                        $subtotal += floatval($this->qty1) * floatval($this->harga1);
                        $subtotal += floatval($this->qty2) * floatval($this->harga2);
                        $subtotal += floatval($this->qty3) * floatval($this->harga3);
                        $subtotal += floatval($this->qty4) * floatval($this->harga4);
                        $subtotal += floatval($this->qty5) * floatval($this->harga5);
                        $subtotal += floatval($this->qty6) * floatval($this->harga6);
                        $subtotal += floatval($this->qty7) * floatval($this->harga7);
                        $subtotal += floatval($this->qty8) * floatval($this->harga8);
                        $subtotal += floatval($this->qty9) * floatval($this->harga9);
                        $subtotal += floatval($this->qty10) * floatval($this->harga10);
                        $subtotal += floatval($this->qty11) * floatval($this->harga11);
                        $subtotal += floatval($this->qty12) * floatval($this->harga12);

                        // Add other subtotal calculations here

                        $jumlah = $subtotal;
                        // $total13 = $this->qty13 * $this->harga13;
                        $total13 = floatval($this->qty13) * floatval($this->harga13);


                        return view('livewire.drug.process', [
                            'queue' => $this->queue,
                            'subtotal' => $subtotal,
                            'jumlah' => $jumlah,
                            'total13' => $total13,
                            ]);
                        }
                    }

