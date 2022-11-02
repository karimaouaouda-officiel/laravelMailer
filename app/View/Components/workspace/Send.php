<?php

namespace App\View\Components\workspace;

use Illuminate\View\Component;

class Send extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $user;
    public function __construct($user)
    {
        $this->user  = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = $this->user;
        return view('components.workspace.send' , compact('user'));
    }
}
