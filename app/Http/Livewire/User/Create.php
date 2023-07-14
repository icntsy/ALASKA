<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads; // Menggunakan fitur upload file Livewire


    public $name; // Properti untuk menyimpan nama pengguna
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public $image;
    public $passwordVisible = false;
    public $passwordConfirmationVisible = false;

    protected $rules = [
        'name' => 'required|max:255', // Aturan validasi: nama harus diisi dan maksimal 255 karakter
        'email' => 'required|email:dns|unique:users,email',
        'password' => 'required|confirmed',
        'role' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg'
    ];

    public function create(){
        $this->validate(); // Validasi form input

        $imageName = null;
        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension(); // Generate nama unik untuk file gambar
            $this->image->storeAs('public/images', $imageName); // Simpan file gambar di direktori storage/images dengan nama yang dihasilkan
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => \Hash::make($this->password), // Enkripsi kata sandi menggunakan Hashing
            'role' => $this->role,
            'image' => $imageName
            ]); // Membuat pengguna baru menggunakan model User

            $this->dispatchBrowserEvent('show-message', [
                'type' => 'success',
                'message' => 'Sukses Menambah Data User'
                ]); // Memicu event browser untuk menampilkan pesan sukses
                $this->redirectRoute('user.index'); // Mengarahkan pengguna kembali ke halaman indeks pengguna
            }

            public function togglePasswordVisibility()
            {
                $this->passwordVisible = !$this->passwordVisible; // Toggle visibilitas kata sandi
            }

            public function togglePasswordConfirmationVisibility()
            {
                $this->passwordConfirmationVisible = !$this->passwordConfirmationVisible; // Toggle visibilitas konfirmasi kata sandi
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
