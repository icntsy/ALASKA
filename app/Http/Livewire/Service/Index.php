<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur paginasi Livewire
    public $search; // Properti untuk menyimpan kata kunci pencarian

    protected $listeners = [
        'serviceDeleted' // Mendengarkan event 'serviceDeleted'
    ];

    public function serviceDeleted(){
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'error',
            'message' => 'Data Layanan Berhasil Di Hapus'
            ]); // Memicu event browser untuk menampilkan pesan error
        }

        public function render()
        {

            $services = Service::query(); // Query awal untuk data layanan
            $services->where('name', 'like', '%' . $this->search . '%'); // Menambahkan kondisi pencarian ke query
            $services = $services->paginate(10); // Menerapkan paginasi ke query dengan batasan 10 item per halaman
            return view('livewire.service.index', compact('services')); // Mengembalikan tampilan "livewire.service.index" dengan data layanan
        }
    }
