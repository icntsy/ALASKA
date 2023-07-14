<?php

namespace App\Http\Livewire\Queue;

use App\Models\Patient;
use Livewire\Component;

class CreatePatient extends Component
{
    public $name;
    public $birth_date;
    public $gender;
    public $address;
    public $phone_number;
    public $study;
    public $blood_type;
    public $profession;
    public $allergy;
    public $nik;
    public $noRekamMedis;

    protected $rules = [
        'name' => 'required',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
        'study' => 'required',
        'blood_type' => 'required',
        'profession' => 'required',
        'allergy' => 'required',
        'nik' => 'required|unique:patients,nik'
    ];

    public function create()
    {

        $lastPatient = Patient::latest('no_rekam_medis')->first();
        $lastNumber = $lastPatient ? intval(substr($lastPatient->no_rekam_medis, 3)) : 0;
        $nextNumber = $lastNumber + 1;
        $noRekamMedis = 'KP-' . str_pad($nextNumber, 7, '0', STR_PAD_LEFT);

        $this->validate();
        
        $patient =Patient::create([
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'study' => $this->study,
            'blood_type' => $this->blood_type,
            'profession' => $this->profession,
            'allergy' => $this->allergy,
            'nik' => $this->nik,
            'no_rekam_medis' => $noRekamMedis,
            ]);

            $this->emit('patientSelected', $patient->id);
        }
        public function render()
        {
            return view('livewire.queue.create-patient');
        }
    }
