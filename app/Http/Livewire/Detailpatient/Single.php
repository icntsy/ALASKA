<?php

namespace App\Http\Livewire\Detailpatient;

use App\Models\Patient;
use Livewire\Component;
use Carbon\Carbon;

class Single extends Component
{
    public $patient;
    public $patientIndex;

    // Metode `mount` akan dipanggil saat komponen diinisialisasi dengan menerima sebuah objek Patient dan nilai index
    public function mount(Patient $patient, $patientIndex){
        $this->patient = $patient;
        $this->patientIndex = $patientIndex;
        // Mengkonversi tanggal lahir pasien menjadi usia dengan menggunakan Carbon
        $this->patient->birth_date = Carbon::parse($patient->birth_date)->age;
    }

     // Metode `detail` dipanggil saat tombol "Detail" ditekan
    public function detail(){
        // Mengarahkan pengguna ke halaman detail proses dengan menyertakan ID pasien
        $this->redirectRoute('detailpatient.process', ['patient' => $this->patient->id]);
    }

    /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\View\View|string
    */
    public function render()
    {
        // Mengembalikan tampilan komponen Single
        return view('livewire.detailpatient.single');
    }
}
