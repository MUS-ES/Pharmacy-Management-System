<?php

namespace App\View\Components\popup;

use Illuminate\View\Component;

class Confirm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $msg;

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.popup.confirm');
    }
}
