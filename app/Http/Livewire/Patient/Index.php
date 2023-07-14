<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $listeners = ['patientDeleted'];
    protected $paginationTheme = 'bootstrap'; // Menggunakan tema paginasi 'bootstrap'
    public $sortType;  // Tipe pengurutan (asc/desc)
    public $sortColumn; // Kolom untuk pengurutan
    public function patientDeleted(){
        // Memicu peristiwa browser untuk menampilkan pesan error
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'error',
            'message' => 'Data Pasien Berhasil Di Hapus'
            ]);
        }
        /**
        * @var mixed
        */
        public $search; // Variabel untuk menyimpan kata kunci pencarian

        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */
        public function render()
        {
            $patients = Patient::query(); // Query builder untuk model Patient
            $patients->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('nik', 'like', '%'.$this->search.'%')
            ->orWhere('gender', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orWhere('blood_type', 'like', '%'.$this->search.'%')
            ->orWhere('no_rekam_medis', 'like', '%'.$this->search.'%')
            ->orWhere('phone_number', 'like', '%'.$this->search.'%');

            if($this->sortColumn){
                $patients->orderBy($this->sortColumn, $this->sortType);
            }else{
                $patients->latest('id'); // Mengurutkan berdasarkan ID terbaru secara default
            }
            $patients = $patients->paginate(10); // Mengambil data pasien dengan paginasi 10 data per halaman
            return view('livewire.patient.index', compact('patients')); // Mengembalikan view 'livewire.patient.index' dengan data pasien
        }
    }
