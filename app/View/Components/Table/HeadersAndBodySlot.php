<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class HeadersAndBodySlot extends Component
{
    public array $headers;
    /**
     * Create a new component instance.
     */
    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.headers-and-body-slot');
    }
}
