<?php

namespace App\Http\Livewire\Drug;

use App\Imports\DrugImport;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads; // Menggunakan fitur upload file pada Livewire
    public $file; // Menyimpan file yang diupload oleh pengguna


    public function saveData(){
        $this->validate(); // Validasi input dengan menggunakan aturan validasi yang telah ditentukan

        Excel::import(new DrugImport, $this->file); // Mengimpor data Obat dari file yang diupload menggunakan class DrugImport
        $this->reset(); // Me-reset input file setelah proses impor selesai
        $this->emit('drugImported'); // Memicu event 'drugImported'
    }
    protected $rules = [
        'file' => 'required'
    ]; // Menentukan aturan validasi untuk field 'file'

    public function render()
    {
        return view('livewire.drug.import'); // Mengembalikan view 'livewire.drug.import'
    }

}
