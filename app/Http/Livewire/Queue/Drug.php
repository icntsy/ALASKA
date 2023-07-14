<?php

namespace App\Http\Livewire\Queue;

use App\Models\Queue;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

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
            ->where(function($query) {
                $query->where('queue_number', 'like', '%' . $this->search . '%');
                $query->orWhereHas('patient', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                    $query->orWhere('jenis_rawat', 'like', '%' . $this->search . '%');
                });
                $query->orWhereHas('doctor', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
                $query->orWhereHas('service', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            });

            // Memeriksa peran pengguna yang sedang login

            $user = Auth::user();

            if ($user && $user->role == 'dokter') {
                $queues->where('jenis_rawat', 'Inap')->whereDoesntHave("transaction");

            }

            //  if ($user->role == "apoteker") {

            //      $queues->where(function($queues){
            //          $queues->where('has_check', "1")->where("jenis_rawat", "Jalan")->orWhere("jenis_rawat", NULL)
            //          ->whereDoesntHave('transaction');
            //      });
            // }
            if ($user->role == "apoteker") {
                $queues->where(function($queues) {
                    $queues->where('has_check', "1")
                        ->where(function($query) {
                            $query->where("jenis_rawat", "Jalan")
                                ->orWhereNull("jenis_rawat");
                        })
                        ->whereDoesntHave('transaction');
                });
            }

            $queues->where(function($query) {
                $query->where('has_check', true)->orWhere('has_drug', false);
            });
            $queues = $queues->with("transaction")->paginate(10);

            return view('livewire.queue.drug', compact('queues'));
        }
    }
