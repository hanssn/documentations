<?php

namespace App\View\Components;

use App\Support\Page;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {

        $index = (new Page(app()->getLocale(), 'docs'))->getSidebar();

        return view('layouts.guest', compact('index'));
    }
}
