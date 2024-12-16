<?php

namespace Dissanayake\Everest\App\Http\Livewire;

use Livewire\Component;

class ExampleComponent extends Component
{
    public $message = 'Hello from package lvewire!';

    public function render()
    {
        return view('everest::livewire.example-component');
    }
}