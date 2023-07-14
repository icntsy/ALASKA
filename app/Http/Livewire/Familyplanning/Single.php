<?php

namespace App\Http\Livewire\Familyplanning;

use App\Models\Familyplanning;
use Livewire\Component;
use Carbon\Carbon;

class Single extends Component
{
    public $familyplanning; // Properti untuk menyimpan data KB
    public $familyplanningIndex; // Properti untuk menyimpan indeks data KB

    public function mount(Familyplanning $familyplanning, $familyplanningIndex){
        $this->familyplanning = $familyplanning; // Menginisialisasi properti $familyplanning dengan data KB yang diberikan
        $this->familyplanningIndex = $familyplanningIndex; // Menginisialisasi properti $familyplanningIndex dengan indeks data KB

    }

    public function getAge()
    {
        return Carbon::parse($this->familyplanning->age)->age; // Menghitung usia berdasarkan tanggal lahir pada data KB menggunakan Carbon
    }

    public function delete(){
        $this->familyplanning->delete();
        $this->emit('familyplanningDeleted');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */

    public function render()
    {
        return view('livewire.familyplanning.single');
    }

}
