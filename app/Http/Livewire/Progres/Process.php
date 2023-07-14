<?php

namespace App\Http\Livewire\Progres;

use App\Models\Diagnosis;
use App\Models\Lab;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordDetail;
use App\Models\MedicalRecordDiagnosa;
use App\Models\MedicalRecordDrugs;
use App\Models\MedicalRecordLab;
use App\Models\MedicalRecordInap;
use App\Models\HistoryMcu;
use App\Models\Pregnantmom;
use App\Models\Queue;
use App\Models\Gravida;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Process extends Component
{
    public $queue;
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
    public $keterangan;

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
            'keterangan' => 'required',
        ];
    }

    public  function mount(Queue $queue)
    {
        $this->queue = $queue;
        $this->allergy = $this->queue->patient->allergy;
        $this->main_complaint = $this->queue->main_complaint;
    }
    public function render()
    {
        $user = Auth::user();
        $role = $user->role;

        return view('livewire.progres.process', [
            'role' => $role,
            ]);
        }

        public function addDiagnosa()
        {
            $this->dispatchBrowserEvent('show-model', [
                'id' => 'diagnosa'
                ]);
            }
            public function addLab()
            {
                $this->dispatchBrowserEvent('show-model', [
                    'id' => 'lab'
                    ]);
                }
                public function addDrug()
                {
                    $this->dispatchBrowserEvent('show-model', [
                        'id' => 'drug'
                        ]);
                    }
                    public function deleteLab($id)
                    {
                        unset($this->listLab[$id]);
                        $this->listLab = array_values($this->listLab);
                    }

                    public function deleteDiagnosa($id)
                    {
                        unset($this->listDiagnosa[$id]);
                        $this->listDiagnosa = array_values($this->listDiagnosa);
                    }
                    public function deleteDrug($id)
                    {
                        unset($this->listDrug[$id]);
                        $this->listDrug = array_values($this->listDrug);
                    }

                    public function diagnosaAdded(Diagnosis $diagnosis)
                    {
                        if (!in_array($diagnosis, $this->listDiagnosa)) {
                            $this->listDiagnosa[] = [
                                "diagnosa" => $diagnosis,
                                "description" => "",
                            ];
                        }
                    }

                    public function labAdded(Lab $lab)
                    {
                        if (!in_array($lab, $this->listLab)) {
                            $this->listLab[] = [
                                "lab" => $lab,
                                "result" => "",
                            ];
                            $lab = $lab->paginate(10);
                        }
                    }

                    public function drugAdded(\App\Models\Drug $drug)
                    {
                        if (!in_array($drug, $this->listDrug)) {
                            $this->listDrug[] = [
                                "drug" => $drug,
                                "quantity" => 1,
                                "instruction" => ""
                            ];
                        }
                    }

                    // TODO:: Create queue update function
                    public function update()
                    {
                        # code...
                    }

                    public function save(Request $request)
                    {
                        $validatedData = $this->validate();
                        try {

                            HistoryMcu::create([
                                "medical_record_id" => $this->queue->medicalrecord->id,
                                'physical_test' => json_encode(
                                    [
                                        "blood_pressure" => $this->blood_pressure,
                                        "respiration" => $this->respiration,
                                        "pulse" => $this->pulse,
                                        "temperature" => $this->temperature,
                                        "kepala" => $this->kepala,
                                        "mata" => $this->mata,
                                        "leher" => $this->leher,
                                        "thoraks" => $this->thoraks,
                                        "pulmo" => $this->pulmo,
                                        "abdomen" => $this->abdomen,
                                        "ekstremitas" => $this->ekstremitas,
                                        "keterangan" => $this->keterangan
                                        ]
                                    ),
                                    'patient_id' => $this->queue->patient->id,
                                    ]);

                                    foreach ($this->listDiagnosa as $diagnosa) {
                                        MedicalRecordDiagnosa::create([
                                            "medical_record_id" => $this->queue->medical_record_id,
                                            "diagnosis_id" => $diagnosa["diagnosa"]["id"],
                                            "description" => NULL
                                            ]);
                                        }

                                        foreach ($this->listLab as $lab) {
                                            MedicalRecordLab::create([
                                                "medical_record_id" => $this->queue->medical_record_id,
                                                "lab_id" => $lab["lab"]["id"],
                                                "result" => ""
                                                ]);
                                            }

                                            foreach ($this->listDrug as $drug) {
                                                MedicalRecordDrugs::create([
                                                    "medical_record_id" => $this->queue->medical_record_id,
                                                    "drug_id" => $drug["drug"]["id"],
                                                    "quantity" => $drug["quantity"],
                                                    "instruction" => $drug["instruction"]
                                                    ]);
                                                }

                                            } catch (\Exception $e) {
                                                dd($e);
                                            }

                                            return redirect("/progres");
                                        }
                                        public function selesai() {
                                            // return view('livewire.progres.selesai');
                                            dd($this->queue->medical_record_id);
                                        }
                                    }
