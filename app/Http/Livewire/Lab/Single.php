<?php

namespace App\Http\Livewire\Lab;

use App\Models\Lab;
use Livewire\Component;

class Single extends Component
{
    /**
    * @var Lab $lab
    */
    public $lab;
    public $labIndex;

    public function mount(Lab $lab, $labIndex)
    {
        $this->lab = $lab;
        $this->labIndex = $labIndex;
    }
    public function render()
    {
        $lab = $this->lab;
        return view('livewire.lab.single', compact('lab'));
    }

    public function delete(){
        $this->lab->delete();
        $this->emit('labDeleted');
    }
}
