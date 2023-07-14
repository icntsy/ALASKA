<?php

namespace App\Http\Livewire\Diagnosis;

use App\Exports\DiagnosisExport;
use App\Models\Diagnosis;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur pagination pada Livewire
    protected $paginationTheme = 'bootstrap'; // Menentukan tema pagination yang digunakan
    public $search; // Menyimpan kata kunci pencarian
    protected $queryString = ['search']; // Menentukan parameter pencarian yang akan disertakan dalam URL

    protected $listeners = ['diagnosisDeleted', 'diagnosisCreated', 'diagnosisImported']; // Mendefinisikan event listener
    public $sortType; // Menyimpan tipe pengurutan data
    public $sortColumn; // Menyimpan kolom yang digunakan untuk pengurutan data

    public function diagnosisImported()
    {
        // Menampilkan pesan sukses setelah data Diagnosis diimpor
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Data Diagnosis Berhasil Di Import']);
    }

    public function importData()
    {
        // Memunculkan modal untuk mengunggah file data Diagnosis
        $this->dispatchBrowserEvent('show-model', ['id' => 'modal']);
    }

    public function diagnosisDeleted()
    {
        // Menampilkan pesan setelah data Diagnosis dihapus
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'error',
            'message' => 'Data Diagnosis Berhasil Di Hapus'
        ]);
    }

    public function sort($column)
    {
        // Mengatur kolom dan tipe pengurutan data
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';
        $this->sortColumn = $column;
        $this->sortType = $sort;
    }
    public function render()
    {
        $diagnoses = Diagnosis::query();
        $diagnoses->where('english_name', 'like', '%' . $this->search . '%')
            ->orWhere('indonesian_name', 'like', '%' . $this->search . '%')
            ->orWhere('subcategory', 'like', '%' . $this->search . '%')
            ->orWhere('category', 'like', '%' . $this->search . '%');
        if ($this->sortColumn) {
            $diagnoses->orderBy($this->sortColumn, $this->sortType);
        } else {
            $diagnoses->latest('id');
        }
        $diagnoses = $diagnoses->paginate(10);
        return view('livewire.diagnosis.index', compact('diagnoses'));
    }

    public function exportData()
    {
        // Mengexport data Diagnosis dalam format Excel
        return Excel::download(new DiagnosisExport, 'data-diagnosis.xlsx');
    }
}
