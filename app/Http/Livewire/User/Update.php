<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Update extends Component
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
        'name' => 'required', // Aturan validasi: nama harus diisi
        'email'=> 'required',
        'password' => 'nullable|confirmed',
        'role' => 'required',
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
            'password' => \Hash::make($this->password),
            'role' => $this->role,
        ];

        if (!empty($this->password)) {
            $userData['password'] = \Hash::make($this->password); // Enkripsi kata sandi menggunakan Hashing jika kata sandi diisi
        }

        if ($this->image && $this->image->getClientOriginalName() !== $this->user->image) {
            // Hapus gambar yang sudah ada sebelumnya
            if ($this->user->image) {
                Storage::disk('public')->delete('images/' . $this->user->image);
            }

            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images', $imageName);
            $userData['image'] = $imageName; // Simpan nama file gambar baru ke dalam data pengguna
        }

        $this->user->update($userData); // Memperbarui data pengguna menggunakan metode update pada model User

        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Data User Berhasil Diupdate'
            ]); // Memicu event browser untuk menampilkan pesan sukses

            $this->redirect('/user'); // Mengarahkan pengguna kembali ke halaman "/user"
        }

        public function mount(User $user)
        {
            $this->user = $user; // Menginisialisasi properti $user dengan data pengguna yang diberikan
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = $user->password;
            $this->role = $user->role;
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
            return view('livewire.user.update'); // Mengembalikan tampilan "livewire.user.update"
        }
    }
