<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddParent extends Component
{
    public $currentStep = 1;

    public function render()
    {
        return view('livewire.add-parent');
    }
}
