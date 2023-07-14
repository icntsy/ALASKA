<?php

namespace App\Http\Livewire\Queue;

use App\Models\Queue;
use App\Models\Patient;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Index extends Component

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
            'message' => 'Data Antrian Berhasil Di Hapus'
            ]);
        }
        public function render()
        {

            $queues = Queue::query();
            $queues->where(
                'has_check', false
            );
            // dd($queues->get());
            $queues->Where(function ($query)
            {
                $query->where('queue_number', 'like', '%' . $this->search . '%');
                $query ->orWhereHas('patient', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
                $query ->orWhereHas('doctor', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
                $query ->orWhereHas('service', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            });
            $role = Auth::user()->role; // Definisikan variabel $role
            if (Auth::user()->role == "admin") {
                $queues = $queues->paginate(10);
            } else {
                $queues = $queues->where("doctor_id", Auth::user()->id)->paginate(10);
            }
            return view('livewire.queue.index', compact('queues', 'role')); // Mengirimkan $role ke view
        }
    }
