<?php

namespace App\Http\Livewire\Component;

use App\Models\Diagnosis;
use Livewire\Component;
use Livewire\WithPagination;

class ModalDiagnosa extends Component
{
    use WithPagination;
    // Mengatur tema paginasi menjadi 'bootstrap'
    protected $paginationTheme = 'bootstrap';
    public $search;
    // Mengatur properti yang akan disimpan dalam query string URL
    protected $queryString = ['search'];

     // Properti untuk filter dan pengurutan data diagnosa
    public $sortType;
    public $sortColumn;
    public $id_queue;

    public function render()
    {
        // Membuat query untuk mendapatkan data diagnosa
        $diagnoses = Diagnosis::query();
        // Menerapkan filter berdasarkan kata kunci pencarian yang diberikan oleh pengguna
        $diagnoses->where('english_name', 'like', '%' . $this->search . '%')
            ->orWhere('indonesian_name', 'like', '%' . $this->search . '%')
            ->orWhere('subcategory', 'like', '%' . $this->search . '%')
            ->orWhere('category', 'like', '%' . $this->search . '%');
        // Menerapkan pengurutan jika kolom pengurutan dan tipe pengurutan ditentukan
        if ($this->sortColumn) {
            $diagnoses->orderBy($this->sortColumn, $this->sortType);
        } else {
            $diagnoses->latest('id');
        }
        // Mendapatkan data diagnosa dengan menggunakan paginasi
        $diagnoses = $diagnoses->paginate(10);
        // Mengembalikan tampilan komponen ModalDiagnosa dengan menyertakan data diagnosa yang diperoleh
        return view('livewire.component.modal-diagnosa', compact('diagnoses'));
    }
}
