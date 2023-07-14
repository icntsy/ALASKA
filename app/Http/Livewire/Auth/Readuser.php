<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Readuser extends Component
{


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('livewire.auth.readuser', compact("readuser"));
    }
}
