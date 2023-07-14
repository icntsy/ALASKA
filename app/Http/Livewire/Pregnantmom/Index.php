<?php

namespace App\Http\Livewire\Pregnantmom;

use App\Models\Pregnantmom;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $listeners = ['pregnantmomDeleted'];
    protected $paginationTheme = 'bootstrap'; // Menggunakan tema paginasi 'bootstrap'
    public $sortType; // Tipe pengurutan (asc/desc)
    public $sortColumn; // Kolom untuk pengurutan
    public function pregnantmomDeleted(){
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Data Ibu Hamil Berhasil Di Hapus'
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
            $pregnantmoms = Pregnantmom::query();
            $pregnantmoms->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('age', 'like', '%'.$this->search.'%');
            if($this->sortColumn){
                $pregnantmoms->orderBy($this->sortColumn, $this->sortType);
            }else{
                $pregnantmoms->latest('id'); // Mengurutkan berdasarkan ID terbaru secara default
            }
            $pregnantmoms = $pregnantmoms->paginate(10); // Mengambil data preganantmom dengan paginasi 10 data per halaman
            return view('livewire.pregnantmom.index', compact('pregnantmoms')); // Mengembalikan view 'livewire.preganantmom.index' dengan data pasien
        }
    }
