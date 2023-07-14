<?php

namespace App\Http\Livewire\History;

use App\Models\History;
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
        $records = History::query();
        $records = $records->paginate(10);

        return view('livewire.History.table', compact('records'));
    }
}
