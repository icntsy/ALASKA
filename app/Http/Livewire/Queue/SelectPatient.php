<?php

namespace App\Http\Livewire\Queue;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class SelectPatient extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $sortType;
    public $sortColumn;

    public function render()
    {
        $patients = Patient::query();
        $patients->where('name', 'like', '%'.$this->search.'%')
        ->orWhere('nik', 'like', '%'.$this->search.'%')->orWhere('birth_date', 'like', '%'.$this->search.'%')->orWhere('address', 'like', '%'.$this->search.'%')->orWhere('no_rekam_medis', 'like', '%'.$this->search.'%');
        if($this->sortColumn){
            $patients->orderBy($this->sortColumn, $this->sortType);
        }else{
            $patients->latest('id');
        }
        $patients = $patients->paginate(10);
        return view('livewire.queue.select-patient', compact('patients'));
    }
}
