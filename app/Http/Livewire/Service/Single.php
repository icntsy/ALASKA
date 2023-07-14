<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class Single extends Component
{

    public $service; // Properti untuk menyimpan data layanan
    public $serviceIndex; // Properti untuk menyimpan indeks layanan

    public function delete(){
        $this->service->delete(); // Menghapus data layanan
        $this->emit('serviceDeleted'); // Memancarkan event 'serviceDeleted'

    }

    public function mount(Service $service, $serviceIndex){
        $this->service = $service; // Menginisialisasi properti $service dengan data layanan yang diberikan
        $this->serviceIndex = $serviceIndex; // Menginisialisasi properti $serviceIndex dengan indeks layanan yang diberikan

    }
    public function render()
    {
        return view('livewire.service.single'); // Mengembalikan tampilan "livewire.service.single"
    }
}
