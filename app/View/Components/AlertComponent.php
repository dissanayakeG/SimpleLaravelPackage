<?php

namespace Dissanayake\Everest\App\View\Components;

use Illuminate\View\Component;

class AlertComponent extends Component{
    public function __construct()
    {
        
    }

    public function render(){
        return view('everest::alert');
    }
}