<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class Single extends Component
{
    public $room; // Properti untuk menyimpan data room
    public $roomIndex; // Properti untuk menyimpan indeks room

    public function mount(Room $room, $roomIndex)
    {
        $this->room = $room; // Menginisialisasi properti $room dengan data room yang diberikan
        $this->roomIndex = $roomIndex;
    }
    /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\View\View|string
    */

    public function render()
    {
        $room = $this->room;
        return view('livewire.room.single', compact("room")); // Mengembalikan tampilan "livewire.room.single"
    }
    public function delete()
    {
        $this->room->delete();
        $this->emit('roomDeleted');
    }
}
