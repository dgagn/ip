<?php

namespace App\View\Components;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $value = $_COOKIE['theme'] ?? 'light';

        return view("layouts.app", ["theme" => $value]);
    }
}
