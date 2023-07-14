<?php

namespace App\Http\Livewire\Diagnosis;

use App\Imports\DiagnosisImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads; // Menggunakan fitur upload file pada Livewire
    public $file; // Menyimpan file yang diupload oleh pengguna

    public function render()
    {
        return view('livewire.diagnosis.import'); // Mengembalikan view 'livewire.diagnosis.import'
    }
}
