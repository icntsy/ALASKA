<?php

namespace App\Http\Livewire\Progres;

use App\Models\Queue;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Drug extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $listeners = [
        'queueDeleted','queueUpdated'
    ];

    public function queueDeleted(){
        $this->dispatchBrowserEvent('show-message',[
            'type' => 'success',
            'message' => 'Data Berhasil dihapus'
            ]);
        }
        public function render()
        {
            $queues = Queue::query()
            ->where('queue_number', 'like', '%' . $this->search . '%');

            $queues->whereDate('created_at', Carbon::today())->where('has_check', true)->where('has_drug', false);
            $queues = $queues->paginate(5);
            return view('livewire.queue.drug', compact('queues'));
        }
    }
