<?php

namespace App\Http\Livewire\Diagnosis;

use App\Models\Diagnosis;
use Livewire\Component;

class Update extends Component
{
    public $category;
    public $subcategory;
    public $english_name;
    public $indonesian_name;
    public $diagnosis;


    public function rules()
    {
        return [
            'category' => 'required',
            'subcategory' => 'required',
            'english_name' => 'required',
            'indonesian_name' => 'required'
        ];
    }


    public function mount(Diagnosis $diagnosis)
    {
        // Menginisialisasi data Diagnosis yang akan diupdate
        $this->category = $diagnosis->category;
        $this->subcategory = $diagnosis->subcategory;
        $this->english_name = $diagnosis->english_name;
        $this->indonesian_name = $diagnosis->indonesian_name;
    }

    public function update()
    {
        $this->validate(); // Validasi input dengan menggunakan aturan validasi yang telah ditentukan
        $this->diagnosis->update([
            'category' => $this->category,
            'subcategory' => $this->subcategory,
            'english_name' => $this->english_name,
            'indonesian_name' => $this->indonesian_name
        ]); // Mengupdate data Diagnosis dengan menggunakan metode `update()`

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Data Diagnosis Berhasil Diupdate', ['name' => __('Article')])]);
        return redirect("/diagnosis"); // Mengarahkan pengguna kembali ke halaman daftar Diagnosis
    }

    public function render()
    {
        return view('livewire.diagnosis.update'); // Mengembalikan view 'livewire.diagnosis.update'
    }
}
