<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * La méthode de rendu.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.navbar');
    }
}
