<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Single extends Component
{
    public $user; // Properti untuk menyimpan data pengguna

    public function mount(User $user){
        $this->user = $user; // Menginisialisasi properti $user dengan data pengguna yang diberikan
    }

    public function delete(){
        $this->user->delete(); // Menghapus data pengguna
        $this->emit('userDeleted'); // Memancarkan event 'userDeleted'
    }
    /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\View\View|string
    */
    public function render()
    {
        return view('livewire.user.single'); // Mengembalikan tampilan "livewire.user.single"
    }
}
