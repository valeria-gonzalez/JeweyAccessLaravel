<?php

namespace App\View\Components\text;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pageHeading1 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $span = '',
        public string $afterSpan = '',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text.page-heading1');
    }
}
