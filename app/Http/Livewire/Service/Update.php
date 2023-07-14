<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class Update extends Component
{
    public $service; // Properti untuk menyimpan data layanan
    public $name;

    protected $rules = [
        'name' => 'required|string', // Aturan validasi: nama harus diisi dan berupa string
    ];

    public function updated($input)
    {
        $this->validateOnly($input); // Validasi input yang berubah
    }

    public function update()
    {
        $this->validate(); // Validasi form input dengan menggunakan aturan validasi yang didefinisikan

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Data Layanan Berhasil Diupdate', ['name' => __('Article')])]); // Memicu event browser untuk menampilkan pesan sukses

        $this->service->update([
            'name' => $this->name,

            ]); // Perbarui nama layanan dengan nilai dari properti $name
            return redirect("/layanan"); // Mengarahkan pengguna ke halaman "/layanan"
        }

        public function mount(Service $service)
        {
            $this->service = $service; // Menginisialisasi properti $service dengan data layanan yang diberikan
            $this->name = $service->name;
        }

        public function render()
        {
            return view('livewire.service.update'); // Mengembalikan tampilan "livewire.service.update"
        }
    }
