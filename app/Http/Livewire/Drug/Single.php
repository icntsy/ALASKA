<?php

namespace App\Http\Livewire\Drug;

use App\Models\Drug;
use Livewire\Component;

class Single extends Component
{
    public $drug; // Menyimpan data obat
    public $available; // Menyimpan status ketersediaan obat
    public $drugIndex; // Menyimpan indeks obat

    public function mount(Drug $drug, $drugIndex){
        $this->drug = $drug;
        $this->drugIndex = $drugIndex;
        $this->available = $drug->min_stok < $drug->stok; // Memeriksa ketersediaan obat
    }

    public function render()
    {
        return view('livewire.drug.single');
    }

    public function delete(){
        $this->drug->delete(); // Menghapus data obat
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('Data Obat Berhasil di Hapus', ['name' => __('Article') ]) ]);
        $this->emit('articleDeleted'); // Emit event untuk memberitahu komponen lain bahwa data obat telah dihapus
    }
}
