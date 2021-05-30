<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Count extends Component
{

    public $incement = 0;


    public function counter(){
        $this->incement++;
    }

    public function render()
    {

        return view('livewire.count');
    }
}
