<?php

namespace App\Http\Livewire\Nota;

use App\Models\Drug;
use App\Models\Queue;
use App\Models\Transaction;
use Livewire\Component;

class Process extends Component
{
    public $queue;
    public $payment;

    protected $rules = [
        'payment' => 'required|numeric',
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
         // Fungsi untuk men-submit pembayaran dan membuat entri transaksi baru
        public function submit () {
            // Melakukan validasi input pembayaran
            $this->validate();
            // Membuat entri transaksi baru dengan menggunakan nilai pembayaran yang diberikan
            Transaction::create([
                'queue_id' =>$this->queue->id,
                'payment' => $this->payment
                ]);
                // Mengarahkan pengguna ke rute 'queue.drug'
                $this->redirectRoute('queue.drug');
            }
            // Fungsi untuk merender tampilan komponen
            public function render()
            {
                return view('livewire.drug.process');
            }
        }
