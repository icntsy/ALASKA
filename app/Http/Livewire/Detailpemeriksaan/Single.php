<?php

namespace App\Http\Livewire\Detailpemeriksaan;

use App\Models\Familyplanning;
use Livewire\Component;
use Carbon\Carbon;

class Single extends Component
{
    public $familyplanning; // Menyimpan data Familyplanning
    public $familyplanningIndex; // Menyimpan indeks data Familyplanning

    public function mount(Familyplanning $familyplanning, $familyplanningIndex){
        // Menginisialisasi data Familyplanning dan indeksnya
        $this->familyplanning = $familyplanning;
        $this->familyplanningIndex = $familyplanningIndex;
    }

    public function getAge()
    {
        // Menghitung usia berdasarkan tanggal lahir yang ada pada data Familyplanning
        return Carbon::parse($this->familyplanning->age)->age;
    }

    public function pemeriksaan(){
        // Mengarahkan pengguna ke rute 'detailpemeriksaan.process' dengan menyertakan ID Familyplanning
        $this->redirectRoute('detailpemeriksaan.process', ['familyplanning' => $this->familyplanning->id]);
    }

    /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\View\View|string
    */
    public function render()
    {
         // Mengembalikan view 'livewire.detailpemeriksaan.single'
        return view('livewire.detailpemeriksaan.single');
    }
}
