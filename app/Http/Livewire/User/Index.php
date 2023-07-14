<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur paginasi Livewire
    use WithFileUploads; // Menggunakan fitur upload file Livewire
    protected $paginationTheme = 'bootstrap'; // Mengatur tema paginasi menjadi 'bootstrap'
    public $search; // Properti untuk menyimpan kata kunci pencarian
    protected $queryString = ['search']; // Properti untuk mengatur query string pencarian

    public $sortType; // Properti untuk menyimpan tipe pengurutan
    public $sortColumn; // Properti untuk menyimpan kolom pengurutan

    public function delete(User $user)
    {
        $user->delete(); // Menghapus pengguna

        $this->dispatchBrowserEvent('show-message', [
            'type' => 'error',
            'message' => 'Data User Berhasil Di Hapus.'
            ]); // Memicu event browser untuk menampilkan pesan error
        }
        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */
        public function render()
        {
            $users = User::query(); // Query awal untuk data pengguna
            $users1 = User::query();
            $users->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('role', 'like', '%'.$this->search.'%'); // Menambahkan kondisi pencarian ke query
            $users = $users->paginate(10); // Menerapkan paginasi ke query dengan batasan 10 item per halaman

            $no = ($users->currentPage() - 1) * $users->perPage() + 1; // Menghitung nomor urut berdasarkan halaman saat ini
            return view('livewire.user.index', compact('users', 'users1', 'no')); // Mengembalikan tampilan "livewire.user.index" dengan data pengguna, data pengguna (untuk keperluan pengurutan), dan nomor urut
        }
    }
