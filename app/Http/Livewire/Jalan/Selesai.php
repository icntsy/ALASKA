<?php

namespace App\Http\Livewire\Jalan;

use App\Models\Queue;
use Livewire\Component;
use App\Models\MedicalRecordStatus;
use App\Models\MedicalRecordInap;
use Illuminate\Support\Facades\Auth;

class Selesai extends Component
{
    public $queue;
    public $role; // Tambahkan properti $role

    public $pemeriksaan_penunjang;
    public $terapi_pulang;
    public $terapi_tindakan;
    public $keadaan;
    public $cara_keluar;

    public function delete(){
        $this->queue->delete();
        $this->emit('queueDeleted');
    }

    public function rules()
    {
        return [
            'pemeriksaan_penunjang' => 'required',
            'terapi_pulang' => 'required',
            'terapi_tindakan' => 'required',
            'keadaan' => 'required',
            'cara_keluar' => 'required',
        ];
    }

    public  function mount(Queue $queue)
    {
        $this->queue = $queue;
    }

    public function render()
    {
        return view('livewire.progres.selesai');
    }

    public function save()
    {
        try {
            $medical_record_inap = MedicalRecordInap::create([
                "medical_record_id" => $this->queue->medical_record_id,
                "physical_test" => json_encode(
                    [
                        'pemeriksaan_penunjang' => $this->pemeriksaan_penunjang,
                        "terapi_pulang" => $this->terapi_pulang,
                        "terapi_tindakan" => $this->terapi_tindakan,
                        "keadaan" => $this->keadaan,
                        "cara_keluar" => $this->cara_keluar
                    ]
                ),
                "doctor_id" => 1,
                "patient_id" => 1
            ]);
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect("/progres");
    }
}
