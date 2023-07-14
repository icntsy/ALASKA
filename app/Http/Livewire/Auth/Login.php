<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{

    // Mendefinisikan properti yang akan digunakan dalam komponen ini
    public $password;
    public $email;
    public $keeplogin;
    public $passwordVisible = false;
    public $passwordConfirmationVisible = false;

    // Mendefinisikan aturan validasi untuk properti yang diisi oleh pengguna
    protected $rules = [
        'password' => 'required',
        'email' => 'required|email:dns|exists:users,email'
    ];

    // Metode ini akan dipanggil saat tombol "login" ditekan
    public function login()
    {
        // Melakukan validasi input dari pengguna
        $data_credential = $this->validate();
        // Memeriksa kecocokan data login dengan menggunakan Auth::attempt()
        if (Auth::attempt($data_credential, $this->keeplogin)) {
            if (Auth::user()->role == 'pengguna') {
                $this->redirectRoute('dokumentasi_api');
            // } elseif (Auth::user()->role == 'bidan') {
            //         return redirect()->route('home.bidan');                
            } else {
                // $this->redirectRoute('home');
                    return redirect()->route('home');
            }
        } else {
            // Jika login gagal, mengatur ulang input dan menampilkan pesan error
            $this->reset();
            $this->dispatchBrowserEvent('show-message', [
                'type' => 'error',
                'message' => 'Login Gagal Pastikan email dan password yang anda inputkan benar.'
            ]);
        }
    }

    // Metode ini digunakan untuk mengganti visibilitas password
    public function togglePasswordVisibility()
    {
        $this->passwordVisible = !$this->passwordVisible;
    }

    // Metode ini digunakan untuk mengganti visibilitas konfirmasi password
    public function togglePasswordConfirmationVisibility()
    {
        $this->passwordConfirmationVisible = !$this->passwordConfirmationVisible;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        // Mengembalikan tampilan komponen login dan menggunakan layout 'layouts.plain'
        return view('livewire.auth.login')->layout('layouts.plain');
    }
}