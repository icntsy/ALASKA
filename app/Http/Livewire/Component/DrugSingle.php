<?php

namespace App\Http\Livewire\Component;

use App\Models\Drug;
use Livewire\Component;

class DrugSingle extends Component
{
    public $drug;

    // Metode `select` dipanggil saat pengguna memilih obat
    public function select(){
        // Mengirimkan event 'drugAdded' dengan mengirimkan ID obat kepada komponen induk
        $this->emit('drugAdded', $this->drug->id);
    }

    // Metode `mount` akan dipanggil saat komponen diinisialisasi dengan menerima sebuah objek Drug
    public function mount(Drug $drug){
        // Mengatur properti `drug` dengan objek Drug yang diterima
        $this->drug = $drug;
    }
    public function render()
    {
        // Mengembalikan tampilan komponen DrugSingle
        return view('livewire.component.drug-single');
    }
}
