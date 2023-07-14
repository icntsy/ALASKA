<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Update extends Component
{
    use WithFileUploads; // Menggunakan fitur upload file Livewire

    public $name; // Properti untuk menyimpan nama pengguna
    public $email;
    public $password;
    public $password_confirmation;
    public $passwordVisible = false;
    public $passwordConfirmationVisible = false;
    public $image;

    protected $rules = [
        'name' => 'required', // Aturan validasi: nama harus diisi
        'email' => 'required|email',
        'password' => 'nullable|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg'
    ];

    public function updated($input)
    {
        $this->validateOnly($input); // Validasi hanya input yang telah diperbarui
    }

    public function update()
    {
        $this->validate(); // Validasi form input

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password), // Enkripsi kata sandi menggunakan Hashing jika kata sandi diisi
        ];

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;

        if (!empty($this->password)) {
            $userData['password'] = Hash::make($this->password);
        }

        if ($this->image && $this->image->getClientOriginalName() !== $user->image) {
            // Hapus gambar yang sudah ada sebelumnya
            if ($user->image) {
                Storage::disk('public')->delete('images/' . $user->image);
            }

            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images', $imageName);
            $userData['image'] = $imageName;
        }

        $user->update($userData);

        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Data User Berhasil Diupdate'
            ]);

            return redirect('/profile');
        }

        public function mount()
        {
            $user = Auth::user();
            $this->name = $user->name; // Menginisialisasi properti $user dengan data pengguna yang diberikan
            $this->email = $user->email;
            $this->password = $user->password;
        }

        public function togglePasswordVisibility()
        {
            $this->passwordVisible = !$this->passwordVisible; // Toggle visibilitas kata sandi
        }

        public function togglePasswordConfirmationVisibility()
        {
            $this->passwordConfirmationVisible = !$this->passwordConfirmationVisible; // Toggle visibilitas konfirmasi kata sandi
        }

        public function render()
        {
            return view('livewire.profile.update'); // Mengembalikan tampilan "livewire.profile.update"
        }
    }
