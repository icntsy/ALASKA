<?php

namespace App\Http\Livewire\Jasa;

use App\Exports\DrugExport;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];

    protected $listeners = ['articleDeleted', 'drugCreated'];
    public $sortType;
    public $sortColumn;

    public function importData()
    {
        $this->dispatchBrowserEvent('show-model', ['id' => 'modal']);
    }

    public function downloadData()
    {
        return Excel::download(new DrugExport, 'drug-data.xlsx');
    }
    public function drugCreated()
    {
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Created Message', ['name' => __('Article')])]);
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'asc' ? 'desc' : 'asc';
        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    public function render()
    {
        $user = User::query();
        $user->where('name', 'like', '%' . $this->search . '%');
        if ($this->sortColumn) {
            $user->orderBy($this->sortColumn, $this->sortType)->where("role", "dokter")->orWhere("role", "bidan");
        } else {
            $user->orderBy('id', 'asc')->where("role", "dokter")->orWhere("role", "bidan");
        }
        $user = $user->paginate(10);

        return view('livewire.jasa.index', ['user' => $user]);
    }
}
