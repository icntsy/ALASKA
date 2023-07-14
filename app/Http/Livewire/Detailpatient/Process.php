<?php

namespace App\Http\Livewire\Detailpatient;

use App\Models\Diagnosis;
use App\Models\Lab;
use App\Models\Queue;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordDetail;
use App\Models\MedicalRecordDiagnosa;
use App\Models\MedicalRecordDrugs;
use App\Models\MedicalRecordLab;
use App\Models\MedicalRecordInap;
use App\Models\HistoryMcu;
use App\Models\Pregnantmom;
use App\Models\Patient;
use App\Models\Gravida;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Process extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $queue;
    public $patient;
    public $listDiagnosa = [];
    public $listDrug = [];
    public $listLab = [];

    public $kepala;
    public $mata;
    public $thoraks;
    public $leher;
    public $pulmo;
    public $abdomen;
    public $ekstremitas;
    public $blood_pressure;
    public $respiration;
    public $pulse;
    public $temperature;

    public $complaint;

    protected $listeners = [
        'diagnosaAdded',
        'labAdded',
        'drugAdded',
    ];


    public function rules()
    {
        return [
            'blood_pressure' => 'required',
            'respiration' => 'required',
            'pulse' => 'required',
            'temperature' => 'required',
            'kepala' => 'required',
            'mata' => 'required',
            'leher' => 'required',
            'thoraks' => 'required',
            'pulmo' => 'required',
            'abdomen' => 'required',
            'ekstremitas' => 'required',
        ];
    }

    public  function mount(Patient $patient, Queue $queue)
    {
        $this->patient = $patient;
    }



    public function render()
    {
        $antrian = Queue::where("patient_id", $this->patient->id)->where("jenis_rawat", "!=", NULL)->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.detailpatient.process', ["antrian" => $antrian]);

    }
}
