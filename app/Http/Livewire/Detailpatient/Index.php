<?php

namespace App\Http\Livewire\Detailpatient;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
     // Mengatur tema paginasi menjadi 'bootstrap'
    protected $paginationTheme = 'bootstrap';
    // Properti untuk pengurutan data
    public $sortType;
    public $sortColumn;
        /**
        * @var mixed
        */
        // Properti untuk pencarian data
        public $search;

        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */
        public function render()
        {
            // Membuat query untuk mendapatkan data pasien berdasarkan kata kunci pencarian
            $patients = Patient::query();
            $patients->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('nik', 'like', '%'.$this->search.'%')
            ->orWhere('gender', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orWhere('blood_type', 'like', '%'.$this->search.'%')
            ->orWhere('no_rekam_medis', 'like', '%'.$this->search.'%')
            ->orWhere('phone_number', 'like', '%'.$this->search.'%');

            // Menerapkan pengurutan jika kolom pengurutan dan tipe pengurutan ditentukan
            if($this->sortColumn){
                $patients->orderBy($this->sortColumn, $this->sortType);
            }else{
                $patients->latest('id');
            }
            // Mendapatkan data pasien dengan menggunakan paginasi
            $patients = $patients->paginate(10);
            // Mengembalikan tampilan komponen Index dengan menyertakan data pasien yang diperoleh
            return view('livewire.detailpatient.index', compact('patients'));
        }
    }
