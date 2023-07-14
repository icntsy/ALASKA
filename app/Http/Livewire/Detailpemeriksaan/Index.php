<?php

namespace App\Http\Livewire\Detailpemeriksaan;

use App\Models\Familyplanning;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur pagination pada Livewire
    protected $paginationTheme = 'bootstrap'; // Menentukan tema pagination yang digunakan
    public $sortType; // Menyimpan tipe pengurutan data
    public $sortColumn; // Menyimpan kolom yang digunakan untuk pengurutan data

        /**
        * @var mixed
        */
        public $search; // Menyimpan kata kunci pencarian

        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */
        public function render()
        {

            // Membuat query untuk mengambil data Familyplanning
            $familyplannings = Familyplanning::query();
            // Menambahkan kondisi pencarian ke query
            $familyplannings->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('age', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orWhere('entry_date', 'like', '%'.$this->search.'%')
            ->orWhere('husbands_name', 'like', '%'.$this->search.'%');
            // Menambahkan pengurutan data jika kolom dan tipe pengurutan telah ditentukan
            if($this->sortColumn){
                $familyplannings->orderBy($this->sortColumn, $this->sortType);
            }else{
                $familyplannings->latest('id');
            }
            // Mengambil data dengan menggunakan pagination dan menyimpannya dalam variabel $familyplannings
            $familyplannings = $familyplannings->paginate(10);
            // Mengembalikan view 'livewire.detailpemeriksaan.index' dengan data $familyplannings
            return view('livewire.detailpemeriksaan.index',['familyplannings' => $familyplannings]);
        }
    }
