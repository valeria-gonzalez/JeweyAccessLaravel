<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hoverableTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public array $headings = [],
        public array $models = [],
        public array $properties = [],
        public array $actions = [],
        public array $actionRoutes = [],
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.hoverable-table');
    }
}
