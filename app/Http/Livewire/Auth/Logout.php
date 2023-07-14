<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{

     // Metode ini digunakan untuk logout pengguna
    public function logout(){
        \Auth::logout();
        $this->redirectRoute('login');
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // Mengembalikan tampilan komponen logout
        return view('livewire.auth.logout');
    }
}
