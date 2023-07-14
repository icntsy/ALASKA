<?php

namespace App\Http\Livewire\Detailpemeriksaan;

use App\Models\Patient;
use App\Models\Queue;
use Livewire\Component;
use Carbon\Carbon;

class Data extends Component
{
    public $value;
    public $valueIndex;

    // Metode `mount` akan dipanggil saat komponen diinisialisasi dengan menerima sebuah objek Queue dan nilai index
    public function mount(Queue $value, $valueIndex){
        $this->value = $value;
        $this->valueIndex = $valueIndex;
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
        // Mengembalikan tampilan komponen Data
        return view('livewire.detailpatient.data');
    }

    // Metode `historydetail` dipanggil saat tombol "History" ditekan
    public function historydetail()
    {
        if ($this->value->jenis_rawat == "Inap") {
            $this->redirectRoute("progres.history", ["queue" => $this->value]);
        } else if ($this->value->jenis_rawat == "Jalan") {
            $this->redirectRoute("jalan.history", ["queue" => $this->value]);
        }
    }
}
