<?php

namespace App\Http\Livewire\Drug;

use App\Exports\DrugExport;
use App\Models\Drug;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur paginasi pada Livewire
    protected $paginationTheme = 'bootstrap'; // Menggunakan tema paginasi bootstrap
    public $search; // Menyimpan nilai dari input pencarian
    protected $queryString = ['search']; // Menyimpan input pencarian pada URL

    protected $listeners = ['articleDeleted', 'drugCreated', 'drugImported']; // Mendengarkan event 'articleDeleted', 'drugCreated', dan 'drugImported'
    public $sortType; // Menyimpan tipe pengurutan (asc/desc)
    public $sortColumn; // Menyimpan kolom yang digunakan untuk pengurutan

    public function articleDeleted()
    {
    }

    public function importData()
    {
        $this->dispatchBrowserEvent('show-model', ['id' => 'modal']); // Memanggil event 'show-model' untuk menampilkan modal
    }

    public function downloadData()
    {
        return Excel::download(new DrugExport, 'data-obat.xlsx'); // Mengunduh data Obat dalam format Excel
    }
    public function drugCreated()
    {
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Created Message', ['name' => __('Article')])]); // Menampilkan pesan sukses setelah pembuatan data Obat
    }
    public function drugImported()
    {
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Data Obat Berhasil Di Import']); // Menampilkan pesan sukses setelah impor data Obat
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'asc' ? 'desc' : 'asc'; // Memutakhirkan tipe pengurutan berdasarkan tipe sebelumnya
        $this->sortColumn = $column; // Menyimpan kolom yang digunakan untuk pengurutan
        $this->sortType = $sort; // Menyimpan tipe pengurutan
    }

    public function render()
    {
        $drugs = Drug::query();
        $drugs->where('nama', 'like', '%' . $this->search . '%')
        ->orWhere('harga', 'like', '%'.$this->search.'%');
        if ($this->sortColumn) {
            $drugs->orderBy($this->sortColumn, $this->sortType); // Mengurutkan data Obat berdasarkan kolom dan tipe pengurutan yang ditentukan
        } else {
            $drugs->orderBy('stok', 'asc'); // Mengurutkan data Obat berdasarkan stok secara ascending
        }
        $drugs = $drugs->paginate(10); // Melakukan paginasi terhadap data Obat dengan batasan 10 item per halaman

        return view('livewire.drug.index', ['drugs' => $drugs]); // Mengembalikan view 'livewire.drug.index' dengan mempassing data Obat yang sudah dipaginasi
    }
}
