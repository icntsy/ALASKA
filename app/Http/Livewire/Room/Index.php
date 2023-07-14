<?php

namespace App\Http\Livewire\Room;

use App\Exports\RoomExport;
use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination; // Menggunakan fitur paginasi Livewire
    protected $paginationTheme = 'bootstrap'; // Menggunakan tema Bootstrap untuk tampilan paginasi
    protected $queryString = ['search']; // Menambahkan parameter pencarian ke URL

    public $search; // Properti untuk menyimpan kata kunci pencarian
    public $sortType; // Properti untuk menyimpan tipe pengurutan (ascend atau descend)
    public $sortColumn; // Properti untuk menyimpan kolom yang digunakan untuk pengurutan

    protected $listeners  = [
        'roomDeleted'
    ];

    public function importData()
    {
        $this->dispatchBrowserEvent('show-model', ['id' => 'modal']); // Memunculkan modal untuk mengimpor data
    }

    public function downloadData()
    {
        return Excel::download(new RoomExport, 'data-ruangan.xlsx'); // Mengunduh data dalam format Excel
    }

    public function roomDeleted()
    {
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Data Berhasil di Hapus'
            ]); // Memicu event browser untuk menampilkan pesan sukses
        }

        public function sort($column)
        {
            $sort = $this->sortType == 'desc' ? 'asc' : 'desc';   // Mengubah tipe pengurutan secara bergantian (ascend atau descend)
            $this->sortColumn = $column; // Mengupdate kolom pengurutan
            $this->sortType = $sort; // Mengupdate tipe pengurutan
        }
        /**
        * Get the view / contents that represent the component.
        *
        * @return \Illuminate\View\View|string
        */
        public function render()
        {
            $rooms = Room::query();
            $rooms->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%'.$this->search.'%');
            $rooms = $rooms->orderBy('created_at', 'desc')->paginate(10); // Mengambil data ruangan dengan paginasi dan mengurutkannya berdasarkan tanggal dibuat
            return view('livewire.room.index', compact('rooms')); // Mengembalikan tampilan "livewire.room.index" dengan data ruangan
        }
    }
