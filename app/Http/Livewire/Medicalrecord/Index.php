<?php

namespace App\Http\Livewire\MedicalRecord;

use App\Models\MedicalRecord;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
// Tambah
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Tambah
    protected $queryString = ['search', 'startDate', 'endDate'];

    public $search;
    public $sortType;
    public $sortColumn;

    // Tambah
    public $startDate;
    public $endDate;

    protected $listeners  = [
        'labDeleted'
    ];


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
        $query = MedicalRecord::query()
            ->where(function ($q) {
                $q->where('id', 'like', '%' . $this->search . '%')
                    ->orWhereHas('drugs', function ($query) {
                        $query->where('nama', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('queue', function ($query) {
                        $query->where('jenis_rawat', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('labs', function ($query) {
                        $query->where('nama', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('diagnoses', function ($query) {
                        $query->where('indonesian_name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('patient', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('patient', function ($query) {
                        $query->where('no_rekam_medis', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('main_complaint', 'like', '%' . $this->search . '%');
            });

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

        $records = $query->paginate(10)->appends(['search' => $this->search, 'startDate' => $this->startDate, 'endDate' => $this->endDate]);

        return view('livewire.medicalrecord.index', compact('records'));
    }
}
