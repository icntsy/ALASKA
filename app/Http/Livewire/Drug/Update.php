<?php

namespace App\Http\Livewire\Drug;

use App\Models\Drug;
use Livewire\Component;

class Update extends Component
{
    public $drug;
    public $nama; // Properti untuk menyimpan nama obat
    public $stok;
    public $harga;
    public $min_stok;

    protected $rules = [
        'nama' => 'required', // Aturan validasi: nama obat harus diisi
        'stok' => 'required',
        'harga' => 'required',
        'min_stok' => 'required|lte:stok'
    ];

    public function updated($input)
    {
        $this->validateOnly($input); // Validasi input yang telah diperbarui
    }

    public function update()
    {
        $this->validate(); // Validasi form input

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Data Obat Berhasil Diupdate' ]); // Memicu event browser untuk menampilkan pesan sukses

        $this->drug->update([
            'nama' => $this->nama,
            'stok' => $this->stok,
            'min_stok' => $this->min_stok,
            'harga' => $this->harga,
        ]); // Memperbarui data obat menggunakan metode update pada model Drug

        return redirect("/obat"); // Mengarahkan pengguna kembali ke halaman "/obat"
    }

    public function mount(Drug $drug){
        $this->nama = $drug->nama; // Menginisialisasi properti $nama dengan obat yang diberikan
        $this->stok = $drug->stok;
        $this->harga = $drug->harga;
        $this->min_stok = $drug->min_stok;

    }
    public function render()
    {
        return view('livewire.drug.update'); // Mengembalikan tampilan "livewire.drug.update"
    }
}
