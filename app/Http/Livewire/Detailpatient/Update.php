<?php

namespace App\Http\Livewire\Detailpatient;

use App\Models\Patient;
use Livewire\Component;

class Update extends Component
{
    public $patient;

    public $name;
    public $birth_date;
    public $gender;
    public $address;
    public $phone_number;
    public $study;
    public $nik;
    public $blood_type;
    public $profession;
    public $allergy;

    protected $rules = [
        'name' => 'required',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
        'study' => 'required',
        'profession' => 'required',
        'nik' => 'required',
        'blood_type' => 'required',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Data Pasien Berhasil Diupdate', ['name' => __('Article') ]) ]);

        $this->patient->update([
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
            ]);
            return redirect("/pasien");
        }
        public function mount(Patient $patient)
        {
            $this->patient = $patient;
            $this->name = $patient->name;
            $this->birth_date = $patient->birth_date;
            $this->gender = $patient->gender;
            $this->address = $patient->address;
            $this->phone_number = $patient->phone_number;
            $this->study = $patient->study;
            $this->blood_type = $patient->blood_type;
            $this->profession = $patient->profession;
            $this->allergy = $patient->allergy;
            $this->nik = $patient->nik;
        }

        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */
        public function render()
        {
            return view('livewire.detailpatient.update');
        }
    }
