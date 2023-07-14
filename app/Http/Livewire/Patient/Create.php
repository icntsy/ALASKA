<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    // Mendefinisikan properti yang akan digunakan dalam komponen ini
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

    // Mendefinisikan aturan validasi untuk properti yang diisi oleh pengguna
    protected $rules = [
        'name' => 'required',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'address' => 'required',
        'study' => 'required',
        'profession' => 'required',
        'blood_type' => 'required',
        'phone_number' => 'required',
        'allergy' => 'required',
        'nik' => 'required|unique:patients,nik'
    ];

     // Metode ini akan dipanggil saat tombol "create" ditekan
    public function create()
    {
        // Membuat nomor rekam medis berdasarkan nomor terakhir yang ada di database
        $lastPatient = Patient::latest('no_rekam_medis')->first();
        $lastNumber = $lastPatient ? intval(substr($lastPatient->no_rekam_medis, 3)) : 0;
        $nextNumber = $lastNumber + 1;
        $noRekamMedis = 'KP-' . str_pad($nextNumber, 7, '0', STR_PAD_LEFT);

         // Melakukan validasi input dari pengguna
        $this->validate();

        // Membuat data pasien baru dalam database
        Patient::create([
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

            // Menampilkan pesan sukses setelah data berhasil ditambahkan
            $this->dispatchBrowserEvent('show-message', [
                'type' => 'success',
                'message' => 'Sukses Menambah Data Pasien'
                ]);
                $this->redirectRoute('patient.index');
            }

            // Mengarahkan pengguna ke halaman index pasien setelah data berhasil ditambahkan
            public function render()
            {
                return view('livewire.patient.create');
            }
        }
