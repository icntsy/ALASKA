<?php

namespace App\Http\Livewire\History;

use App\Models\Gravida;
use App\Models\Pregnantmom;
use Livewire\Component;
use Livewire\WithPagination;

class Update extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $record;

    protected $rules = [
        'nama' => 'required',
        'stok' => 'required',
        'harga' => 'required',
        'min_stok' => 'required|lte:stok'
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Data Obat Berhasil Diupdate' ]);

        $this->drug->update([
            'nama' => $this->nama,
            'dosis' => $this->dosis,
            'stok' => $this->stok,
            'min_stok' => $this->min_stok,
            'harga' => $this->harga,
        ]);

        return redirect("/obat");
    }

    public function mount(Gravida $history){
        $this->history = $history;

    }
    public function render()
    {
        $data = Pregnantmom::where("gravida_id", $this->history->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.history.detail', compact("data"));
    }
}
