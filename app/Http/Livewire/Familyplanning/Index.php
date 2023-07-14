<?php

namespace App\Http\Livewire\Familyplanning;

use App\Models\Familyplanning;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur paginasi Livewire
    protected $listeners = ['familyplanningDeleted'];
    protected $paginationTheme = 'bootstrap'; // Mengatur tema paginasi menjadi 'bootstrap'
    public $sortType; // Properti untuk menyimpan tipe pengurutan
    public $sortColumn; // Properti untuk menyimpan kolom pengurutan
    public function familyplanningDeleted(){
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Data Keluarga Berencana Berhasil Di Hapus'
        ]); // Memicu event browser untuk menampilkan pesan sukses saat data KB dihapus
    }

    /**
     * @var mixed
     */
    public $search; // Properti untuk menyimpan kata kunci pencarian

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */


    public function render()
    {
        $familyplannings = Familyplanning::query(); // Query awal untuk data KB
        $familyplannings->where('name', 'like', '%'.$this->search.'%')
        ->orWhere('age', 'like', '%'.$this->search.'%')
        ->orWhere('address', 'like', '%'.$this->search.'%')
        ->orWhere('entry_date', 'like', '%'.$this->search.'%')
        ->orWhere('husbands_name', 'like', '%'.$this->search.'%'); // Menambahkan kondisi pencarian ke query
        if($this->sortColumn){
            $familyplannings->orderBy($this->sortColumn, $this->sortType); // Menambahkan pengurutan berdasarkan kolom dan tipe pengurutan yang ditentukan
        }else{
            $familyplannings->latest('id'); // Mengurutkan data KB berdasarkan ID terbaru secara default
        }
        $familyplannings = $familyplannings->paginate(10); // Menerapkan paginasi ke query dengan batasan 10 item per halaman
        return view('livewire.familyplanning.index',['familyplannings' => $familyplannings]); // Mengembalikan tampilan "livewire.familyplanning.index" dengan data familyplannings
    }

}
