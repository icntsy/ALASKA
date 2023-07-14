<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur paginasi Livewire
    protected $paginationTheme = 'bootstrap'; // Mengatur tema paginasi menjadi 'bootstrap'
    public $search;
    protected $queryString = ['search'];

    protected $listeners = ['userDeleted'];
    public $sortType; // Properti untuk menyimpan tipe pengurutan
    public $sortColumn; // Properti untuk menyimpan kolom pengurutan


    public function mount()
    {
        $this->user = Auth::user();
    }

    public function userDeleted(){
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => "Data User Berhasil Di Hapus"
            ]);
        }
        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */


        public function render()
        {
            $users = User::query();
            $users1 = User::query();
            $users->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('role', 'like', '%'.$this->search.'%');
            $users = $users->paginate(10);
            return view('livewire.profile.index', compact('users', 'users1')); // Mengembalikan tampilan "livewire.profile.index"
        }
    }
