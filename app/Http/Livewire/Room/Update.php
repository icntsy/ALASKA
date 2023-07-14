<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class Update extends Component
{
    public $room; // Objek model Room
    public $name;

     // Aturan validasi
    protected $rules = [
        'name' => 'required',
    ];

     // Metode mount dijalankan saat komponen diinisialisasi
    public function mount(Room  $room){
        $this->room = $room;
        $this->name = $room->name; // Mengatur properti name dengan nama ruangan
    }

     // Metode ini dipicu saat ada perubahan pada input field
    public function updated($input)
    {
        $this->validateOnly($input); // Melakukan validasi hanya untuk field yang diperbarui
    }


     // Metode ini dipicu saat tombol "update" diklik
    public function update()
    {
        $this->validate(); // Melakukan validasi untuk semua field

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Data Ruangan Berhasil Diupdate', ['name' => __('Article') ]) ]);

        // Memperbarui nama ruangan di database
        $this->room->update([
            'name' => $this->name,
            ]);
            return redirect("/ruangan"); // Mengarahkan pengguna ke URL "/ruangan"
        }
        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */
        public function render()
        {
            return view('livewire.room.update');
        }
    }
