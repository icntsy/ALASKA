<?php

namespace App\Http\Livewire\Queue;

use App\Models\Queue;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Single extends Component
{
    public $queue;
    public $role; // Tambahkan properti $role

    public function mount(Queue $queue){
        $this->queue = $queue;
        $this->role = Auth::user()->role; // Inisialisasi $role
    }

    public function delete(){
        $this->queue->delete();
        $this->emit('queueDeleted');
    }
    public function render()
    {
        return view('livewire.queue.single', [
            'role' => $this->role // Mengirimkan $role ke tampilan
            ]);

        }

        public function processCheckup(){
            $this->redirectRoute('queue.process', ['queue' => $this->queue->id]);
        }

        public function processDrug(){
            $this->redirectRoute('queue.drug.process', ['queue' => $this->queue->id]);
        }
    }
