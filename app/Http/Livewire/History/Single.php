<?php

namespace App\Http\Livewire\History;

use App\Models\Gravida;
use Livewire\Component;

class Single extends Component
{
    public $gravida;
    public $available;
    public $recordIndex;

    public function mount(Gravida $gravida, $recordIndex){
        $this->gravida = $gravida;
        $this->recordIndex = $recordIndex;
    }

    public function render()
    {
        $record = $this->gravida;

        return view('livewire.history.single', compact('record'));
    }
}
