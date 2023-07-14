<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class Create extends Component
{
    public $name; // Properti untuk menyimpan nama ruangan

    protected $rules = [
        'name' => 'required', // Aturan validasi: nama harus diisi
    ];
    public function create(){
        $this->validate(); // Validasi form input dengan menggunakan aturan validasi yang didefinisikan
        Room::create([
            'name' => $this->name, // Simpan nama ruangan dari properti $name
            ]);

            $this->dispatchBrowserEvent('show-message', [
                'type' => 'success',
                'message' => 'Sukses Menambah Data Ruangan'
                ]); // Memicu event browser untuk menampilkan pesan sukses
                $this->redirectRoute('room.index'); // Mengarahkan pengguna ke rute 'room.index'
            }
            /**
            * Get the view / contents that represent the component.
            *
            * @return \Illuminate\View\View|string
            */
            public function render()
            {
                return view('livewire.room.create'); // Mengembalikan tampilan "livewire.room.create"
            }
        }
