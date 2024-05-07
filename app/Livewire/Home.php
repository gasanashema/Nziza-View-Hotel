<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.home')->layout('livewire.layout.base');
    }
}
