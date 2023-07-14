<?php

namespace App\Http\Livewire\Jasa;

use App\Models\Drug;
use App\Models\User;
use App\Models\Queue;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Http\Request;

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

    public function store_harga(Request $req)
    {
        User::where("id", $req->id)->update([
            "harga_jasa" => $req->harga_jasa
            ]);

            return back();
        }

        public function save()
        {
            // TODO:: Create invoice print function before update!!
            try {
                // dd($this->queue);
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
            public function submit () {
                $this->validate();
                Transaction::create([
                    'queue_id' =>$this->queue->id,
                    'payment' => $this->payment
                    ]);
                    $this->redirectRoute('queue.drug');
                }
                public function render()
                {
                    return view('livewire.drug.process');
                }
            }
