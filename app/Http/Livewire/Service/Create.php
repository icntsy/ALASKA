<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class Create extends Component
{
    public $name; // Properti untuk menyimpan nama layanan
    public $status;

    public function rules(){
        return [
            'name' => 'required|unique:services,name', // Aturan validasi: nama harus diisi dan harus unik di dalam tabel services
            'status' => 'required'
        ];
    }

    public function create(){
        $this->validate(); // Validasi form input dengan menggunakan aturan validasi yang didefinisikan
        Service::create([
            'name' => $this->name, // Simpan nama layanan dari properti $name
            'status' => $this->status
            ]);
            $this->dispatchBrowserEvent('show-message', [
                'type' => 'success',
                'message' => 'Sukses Menambah Data Layanan'
                ]); // Memicu event browser untuk menampilkan pesan sukses

                $this->redirectRoute('service.index'); // Mengarahkan pengguna ke rute 'service.index'
            }

            public function render()
            {
                return view('livewire.service.create');
            }
        }
