<?php

namespace App\Http\Livewire\Queue;

use App\Models\Queue;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DrugTable extends Component
{
    public $queue;
    public $role;

    public function mount(Queue $queue){
        $this->queue = $queue;
        $this->role = Auth::user()->role;
    }

    public function delete(){
        $this->queue->delete();
        $this->emit('queueDeleted');
    }

    public function processCheckup(){
        $this->redirectRoute('queue.process', ['queue' => $this->queue->id]);
    }

    public function processDrug(){
        $this->redirectRoute('queue.drug.process', ['queue' => $this->queue->id]);
    }
    public function render()
    {
        return view('livewire.queue.drug-table', [
            'role' => $this->role // Mengirimkan $role ke tampilan
            ]);

        }
    }
