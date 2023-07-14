<?php

namespace App\Http\Livewire\Diagnosis;

use App\Models\Diagnosis;
use Livewire\Component;

class Single extends Component
{
    public $diagnosis; // Menyimpan data Diagnosis
    public $diagnosisIndex; // Menyimpan indeks data Diagnosis

    public function mount(Diagnosis $diagnosis, $diagnosisIndex){
        // Menginisialisasi data Diagnosis dan indeksnya
        $this->diagnosis = $diagnosis;
        $this->diagnosisIndex = $diagnosisIndex;
    }
    public function render()
    {
        return view('livewire.diagnosis.single'); // Mengembalikan view 'livewire.diagnosis.single'
    }

    public function delete(){
        $this->diagnosis->delete(); // Menghapus data Diagnosis dari database
        $this->emit('diagnosisDeleted'); // Memicu event 'diagnosisDeleted'
    }
}
