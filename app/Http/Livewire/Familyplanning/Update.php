<?php

namespace App\Http\Livewire\Familyplanning;

use App\Models\Familyplanning;
use Livewire\Component;

class Update extends Component
{
    public $familyplanning; // Properti untuk menyimpan data KB

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

    public function updated($input)
    {
        $this->validateOnly($input); // Validasi hanya input yang telah diperbarui
    }

    public function update()
    {
        $this->validate(); // Validasi form input

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Data KB Berhasil Diupdate', ['name' => __('Article') ]) ]); // Memicu event browser untuk menampilkan pesan sukses

        $this->familyplanning->update([
            'name' => $this->name,
            'age' => $this->age,
            'address' => $this->address,
            'husbands_name' => $this->husbands_name,
            'entry_date' => $this->entry_date,
        ]); // Memperbarui data KB menggunakan metode update pada model Familyplanning
        return redirect("/keluargaberencana"); // Mengarahkan pengguna kembali ke halaman "/keluargaberencana"
    }
    public function mount(Familyplanning $familyplanning)
    {
        $this->familyplanning = $familyplanning; // Menginisialisasi properti $familyplanning dengan data KB yang diberikan
        $this->name = $familyplanning->name;
        $this->age = $familyplanning->age;
        $this->address = $familyplanning->address;
        $this->entry_date = $familyplanning->entry_date;
        $this->husbands_name = $familyplanning->husbands_name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */

    public function render()
    {
        return view('livewire.familyplanning.update');
    }

}
