<?php

namespace App\Http\Livewire\Component;

use App\Models\Drug;
use Livewire\Component;
use Livewire\WithPagination;

class ModalDrug extends Component
{
    use WithPagination;
    // Mengatur tema paginasi menjadi 'bootstrap'
    protected $paginationTheme = 'bootstrap';
    // Mengatur properti yang akan disimpan dalam query string URL
    protected $queryString = ['search'];

    public $search;

    public function render()
    {
        // Membuat query untuk mendapatkan data obat berdasarkan kata kunci pencarian
        $drugs = Drug::query()->where('nama', 'like', '%' . $this->search . '%');
        // Mendapatkan data obat dengan menggunakan paginasi
        $drugs = $drugs->paginate(10);
        // Mengembalikan tampilan komponen ModalDrug dengan menyertakan data obat yang diperoleh
        return view('livewire.component.modal-drug', compact('drugs'));
    }
}
