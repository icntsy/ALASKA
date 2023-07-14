<?php

namespace App\Http\Livewire\Familyplanning;

use App\Models\FamilyPlanningExamination;
use Livewire\Component;
use App\Models\Familyplanning;

class Buat extends Component
{
    public $arrival_date;  // Properti untuk menyimpan tanggal kedatangan
    public $body_weight;
    public $blood_pressure;
    public $return_date;
    public $familyplanning;

    protected $rules = [
        'arrival_date' => 'required', // Aturan validasi: tanggal kedatangan harus diisi
        'body_weight' => 'required',
        'blood_pressure' => 'required',
        'return_date' => 'required',
    ];

    public function mount(Familyplanning $familyPlanning)
    {
        $this->familyplanning = $familyPlanning; // Menginisialisasi properti $familyplanning dengan data perencanaan keluarga yang diberikan
    }

    public function create()
{
    $this->validate([
        'arrival_date' => 'required',
        'body_weight' => 'required',
        'blood_pressure' => 'required',
        'return_date' => 'required',
    ]); // Validasi form input

    $familyPlanningExamination = new FamilyPlanningExamination([
        'arrival_date' => $this->arrival_date,
        'body_weight' => $this->body_weight,
        'blood_pressure' => $this->blood_pressure,
        'return_date' => $this->return_date,
    ]); // Membuat objek FamilyPlanningExamination dengan data yang diinputkan

    $this->familyplanning->familyPlanningExaminations()->save($familyPlanningExamination);

    $this->dispatchBrowserEvent('show-message', [
        'type' => 'success',
        'message' => 'Sukses Menambah Data Pemeriksaan KB'
    ]); // Memicu event browser untuk menampilkan pesan sukses

    return redirect()->route('familyplanning.index');  // Mengarahkan pengguna kembali ke halaman indeks perencanaan keluarga
}

    public function render()
    {
        return view('livewire.familyplanning.buat');
    }
}
