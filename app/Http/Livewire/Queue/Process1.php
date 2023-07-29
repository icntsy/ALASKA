<?php

namespace App\Http\Livewire\Queue;

use App\Models\Diagnosis;
use App\Models\Lab;
use App\Models\Pregnantmom;
use App\Models\DrugBidan;
use App\Models\Queue;
use App\Models\Gravida;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Process1 extends Component
{
    public $queue;
    public $listDiagnosa = [];
    public $listDrug = [];
    public $listLab = [];

    public $anak_ke;
    public $hpht;
    public $pregnant_age;
    public $lila;
    public $hpl;
    public $tfu;
    public $djj;
    public $weight;
    public $blood_pressure;
    public $immunization_tt;
    public $hpll;
    public $complaint;
    public $harga;

    protected $listeners = [
        'diagnosaAdded',
        'labAdded',
        'drugAdded'
    ];

    public function rules()
    {
        return [
            'immunization_tt' => 'required',
            'anak_ke' => 'required',
            'hpht' => 'required|date',
            'pregnant_age' => 'required',
            'lila' => 'required',
            'hpl' => 'required|date',
            'tfu' => 'required',
            'djj' => 'required',
            'weight' => 'required',
            'blood_pressure' => 'required',
            'hpll' => 'required|date',
            'complaint' => 'required',
            'harga' => 'required|numeric'
        ];
    }

    public function mount(Queue $queue)
    {
        $this->queue = $queue;
    }

    public function render()
    {
        $user = Auth::user();
        $role = $user->role;

        return view('livewire.queue.process1', [
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

    public function save(Request $request)
    {
        $this->validate();

        try {
            if (Auth::user()->role == "bidan") {
                $gravida = Gravida::firstOrCreate(
                    ["patient_id" => $this->queue->patient->id],
                    ["bidan_id" => $this->queue->doctor->id, "hpl" => $this->hpll]
                );

                $pregnantmoms = Pregnantmom::create([
                    "gravida_id" => $gravida->id,
                    "anak_ke" => $this->anak_ke,
                    "hpht" => $this->hpht,
                    "pregnant_age" => $this->pregnant_age,
                    "lila" => $this->lila,
                    "weight" => $this->weight,
                    "blood_pressure" => $this->blood_pressure,
                    "tfu" => $this->tfu,
                    "djj" => $this->djj,
                    "immunization_tt" => $this->immunization_tt,
                    "complaint" => $this->complaint,
                    "hpll" => $this->hpll,
                ]);

                if (Auth::user()->role == "bidan") {
                    foreach ($this->listDrug as $drug) {
                        DrugBidan::create([
                            "pregnantmom_id" => $pregnantmoms->id,
                            "drug_id" => $drug["drug"]["id"],
                            "quantity" => $drug["quantity"],
                            "instruction" => $drug["instruction"],
                            "harga" => $drug["harga"]
                        ]);
                    }
                }

                if (Auth::user()->role == "bidan") {
                    Queue::where("id", $this->queue->id)->update([
                        "pregnantmom_id" => $pregnantmoms->id,
                        "has_check" => true
                    ]);
                    return redirect("/antrian");
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
