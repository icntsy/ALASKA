<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email:dns|unique:users,email',
        'password' => 'required|confirmed',
        'role' => 'required'
    ];

    public function create(){
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => \Hash::make($this->password),
            'role' => $this->role
            ]);

            $this->dispatchBrowserEvent('show-message', [
                'type' => 'success',
                'message' => 'Sukses menambah data user'
                ]);
                $this->redirectRoute('user.index');
            }
            /**
            * Get the view / contents that represent the component.
            *
            * @return \Illuminate\View\View|string
            */
            public function render()
            {
                return view('livewire.user.create');
            }
        }
