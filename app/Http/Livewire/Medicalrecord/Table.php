<?php

namespace App\Http\Livewire\MedicalRecord;

use App\Models\MedicalRecord;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public $search;
    public $sortType;
    public $sortColumn;

    protected $listeners  = [
        'labDeleted'
    ];

    public function render()
    {
        $records = MedicalRecord::query();
        $records = $records->paginate(5);

        return view('livewire.medicalrecord.table', compact('records'));
    }
}
