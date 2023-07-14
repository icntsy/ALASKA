<?php

namespace App\Http\Livewire\Detailpemeriksaan;

use App\Models\FamilyPlanningExamination;
use App\Models\Familyplanning;
use App\Models\Gravida;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Carbon\Carbon;

class Process extends Component
{

    use WithPagination; // Menggunakan fitur pagination pada Livewire
    protected $paginationTheme = 'bootstrap'; // Menentukan tema pagination yang digunakan
    public $familyplanning; // Menyimpan data Familyplanning
    public $sortType; // Menyimpan tipe pengurutan data
    public $sortColumn; // Menyimpan kolom yang digunakan untuk pengurutan data

    public  function mount(Familyplanning $familyplanning)
    {
        $this->familyplanning = $familyplanning;
    }


    public function getAge()
    {
        // Menghitung usia berdasarkan tanggal lahir yang ada pada data Familyplanning
        return Carbon::parse($this->familyplanning->age)->age;
    }

    public function render()
{
   //  Mengambil daftar familyPlanningExaminations terkait dengan Familyplanning saat ini, diurutkan berdasarkan tanggal dibuat secara menurun, dan menggunakan pagination

    $familyPlanningExaminations = $this->familyplanning->familyPlanningExaminations()->get();


    return view('livewire.detailpemeriksaan.process', [
        "antrian" => $this->familyplanning,
        "familyPlanningExaminations" => $familyPlanningExaminations,
    ]);
}


    // public function render()
    // {

    //     // return view('livewire.detailpemeriksaan.process', [
    //     //     "antrian" => $this->familyplanning,
    //     //     "familyPlanningExaminations" => $this->familyplanning->familyPlanningExaminations()->paginate(10),
    //     // ]);

    //     // $antrian = $this->familyplanning;
    //     // return view('livewire.detailpemeriksaan.process', ["antrian" => $antrian]);

    // }
}
