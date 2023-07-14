<?php

namespace App\Http\Livewire\Nota;

use App\Exports\TransactionExport;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
// Tambah
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
     // Tambah
     protected $queryString = ['search', 'startDate', 'endDate'];

    protected $listeners = ['articleDeleted', 'drugCreated'];
    public $sortType;
    public $sortColumn;

      // Tambah
      public $startDate;
      public $endDate;

    public function downloadData()
    {
        $startDate = Session::get('startDate');
    $endDate = Session::get('endDate');

    return Excel::download(new TransactionExport($startDate, $endDate), 'data-nota.xlsx');
    }
    public function drugCreated()
    {
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Created Message', ['name' => __('Article')])]);
    }

      // Tambah
    public function mount()
    {
        $this->startDate = Session::get('startDate');
        $this->endDate = Session::get('endDate');
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';
        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    // Tambah
    public function filterByDate()
    {
        $this->resetPage();
        Session::put('startDate', $this->startDate);
        Session::put('endDate', $this->endDate);
    }

    public function render()
     {
         $query = Transaction::query()
             ->where(function ($q) {
                 $q->where('payment', 'like', '%' . $this->search . '%')
                     ->orWhere('id', 'like', '%' . $this->search . '%')
                     ->orWhereHas('queue.patient', function ($query) {
                         $query->where('name', 'like', '%' . $this->search . '%');
                     })
                     ->orWhereHas('queue.patient', function ($query) {
                         $query->where('jenis_rawat', 'like', '%' . $this->search . '%');
                     })
                     ->orWhereHas('queue.doctor', function ($query) {
                         $query->where('name', 'like', '%' . $this->search . '%');
                     })
                     ->orWhereHas('queue.service', function ($query) {
                         $query->where('name', 'like', '%' . $this->search . '%');
                     })
                     ->orWhereHas('queue.medicalrecord', function ($query) {
                         $query->where('created_at', 'like', '%' . $this->search . '%');
                     })
                     ->orWhereHas('queue.medicalrecord.medicalRecordDrugs.Drugs', function ($query) {
                         $query->where('nama', 'like', '%' . $this->search . '%');
                     });
             });

        //  if ($this->startDate && $this->endDate) {
        //      $startDate = Carbon::parse($this->startDate)->startOfDay();
        //      $endDate = Carbon::parse($this->endDate)->endOfDay();
        //      $query->where(function ($q) use ($startDate, $endDate) {
        //          $q->whereBetween('created_at', [$startDate, $endDate])
        //              ->orWhere(function ($q) use ($startDate, $endDate) {
        //                  $q->whereNull('created_at')
        //                      ->whereDate('created_at', '>=', $startDate)
        //                      ->whereDate('created_at', '<=', $endDate);
        //              });
        //      });
        //  }
        
        if ($this->startDate && $this->endDate) {
            $startDate = Carbon::parse($this->startDate)->startOfDay();
            $endDate = Carbon::parse($this->endDate)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

         if ($this->sortColumn) {
            $query->orderBy($this->sortColumn, $this->sortType);
        } else {
            $query->latest('id');
        }

        // if ($this->sortColumn) {
        //     $transaksi->orderBy($this->sortColumn, $this->sortType);
        // } else {
        //     $transaksi->orderBy('id', 'desc');
        // }

        $transaksi = $query->paginate(10)->appends(['search' => $this->search, 'startDate' => $this->startDate, 'endDate' => $this->endDate]);
        // $transaksi = $transaksi->paginate(5);

        return view('livewire.nota.index', ['transaksi' => $transaksi]);
    }
}
