<?php

namespace App\Http\Livewire\Room;

use App\Imports\DrugImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads; // Menggunakan fitur unggah file Livewire
    public $file; // Properti untuk menyimpan file yang diunggah

    public function render()
    {
        return view('livewire.room.import'); // Mengembalikan tampilan "livewire.room.import"
    }
}
