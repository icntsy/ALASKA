<?php

namespace App\Http\Livewire\Diagnosis;

use App\Models\Diagnosis;
use Livewire\Component;

class Create extends Component
{
    public $category; // Menyimpan kategori diagnosis
    public $subcategory; // Menyimpan subkategori diagnosis
    public $english_name; // Menyimpan nama diagnosis dalam bahasa Inggris
    public $indonesian_name; // Menyimpan nama diagnosis dalam bahasa Indonesia

    protected $rules = [
        'category' => 'required',
        'subcategory' => "required",
        "english_name" => "required",
        "indonesian_name" => "required"
    ]; // Aturan validasi untuk setiap field

    public function create()
    {
        $this->validate(); // Validasi input dengan menggunakan aturan validasi yang telah ditentukan

        Diagnosis::create([
            'category' => $this->category,
            'subcategory' => $this->subcategory,
            'english_name' => $this->english_name,
            'indonesian_name' => $this->indonesian_name
        ]); // Membuat record baru dalam model Diagnosis berdasarkan data yang diinputkan
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Sukses Menambah Data Diagnosis'
        ]); // Memancarkan event 'show-message' ke browser untuk menampilkan pesan sukses

        $this->reset(); // Mengosongkan nilai dari semua field input
        $this->redirectRoute('diagnosis.index'); // Mengarahkan pengguna ke rute 'diagnosis.index'
    }

    public function render()
    {
        return view('livewire.diagnosis.create'); // Mengembalikan view 'livewire.diagnosis.create'
    }
}
