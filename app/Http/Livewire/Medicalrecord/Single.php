<?php

namespace App\Http\Livewire\MedicalRecord;


use App\Models\MedicalRecord;
use Livewire\Component;


class Single extends Component
{
    public $record;
    public $available;
    public $recordIndex;
    public $no_rekam_medis;

    // Inisialisasi komponen dengan objek MedicalRecord dan indeks rekam medis
    public function mount(MedicalRecord $record, $recordIndex){
        $this->record = $record;
        $this->recordIndex = $recordIndex;

    }

    // Fungsi untuk merender tampilan komponen
    public function render()
    {
        $record = $this->record;
        return view('livewire.medicalrecord.single', compact("record"));
    }
}
