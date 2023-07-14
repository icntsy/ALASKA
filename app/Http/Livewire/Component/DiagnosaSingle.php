<?php

namespace App\Http\Livewire\Component;

use App\Models\Diagnosis;
use Livewire\Component;

class DiagnosaSingle extends Component
{
    public $diagnosis;

    // Metode `mount` akan dipanggil saat komponen diinisialisasi dengan menerima sebuah objek Diagnosis
    public function mount(Diagnosis $diagnosis){
        // Mengatur properti `diagnosis` dengan objek Diagnosis yang diterima
        $this->diagnosis = $diagnosis;
    }

    // Metode `select` dipanggil saat pengguna memilih diagnosa
    public function select(){
        // Mengirimkan event 'diagnosaAdded' dengan mengirimkan ID diagnosa kepada komponen induk
        $this->emit('diagnosaAdded', $this->diagnosis->id);
    }
    public function render()
    {
        // Mengembalikan tampilan komponen DiagnosaSingle
        return view('livewire.component.diagnosa-single');
    }
}
