<?php

namespace App\Http\Livewire\Jasa;

use App\Models\User;
use Livewire\Component;

class Single extends Component
{
    public $users;
    public $available;

    public function mount(User $users){
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.jasa.single');
    }

    public function delete(){
        $this->drug->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('Obat Terhapus', ['name' => __('Article') ]) ]);
        $this->emit('articleDeleted');
    }
}
