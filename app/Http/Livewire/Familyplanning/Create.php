<?php

namespace App\Http\Livewire\Familyplanning;

use App\Models\Familyplanning;
use Livewire\Component;

class Create extends Component
{
    public $name; // Properti untuk menyimpan nama
    public $age;
    public $address;
    public $husbands_name;
    public $entry_date;

    protected $rules = [
        'name' => 'required', // Aturan validasi: nama harus diisi
        'age' => 'required',
        'address' => 'required',
        'husbands_name' => 'required',
        'entry_date' => 'required',
    ];

    public function create()
    {
        $this->validate(); // Validasi form input

        Familyplanning::create([
            'name' => $this->name,
            'age' => $this->age,
            'address' => $this->address,
            'husbands_name' => $this->husbands_name,
            'entry_date' => $this->entry_date,
        ]); // Membuat data KB baru menggunakan model Familyplanning
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Sukses Menambah Data KB'
        ]); // Memicu event browser untuk menampilkan pesan sukses

        $this->redirectRoute('familyplanning.index'); // Mengarahkan pengguna kembali ke halaman indeks perencanaan keluarga
    }

    public function render()
    {
        return view('livewire.familyplanning.create');
    }
}
