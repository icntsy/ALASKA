<?php

namespace App\Http\Livewire\Nota;

use App\Imports\DrugImport;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads;
    public $file;

    public function saveData(){
        $this->validate();

        Excel::import(new DrugImport, $this->file);
        $this->reset();
        $this->emit('drugImported');
    }
    protected $rules = [
        'file' => 'required'
    ];

    public function render()
    {
        return view('livewire.drug.import');
    }
    
}
