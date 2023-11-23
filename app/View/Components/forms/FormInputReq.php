<?php

namespace App\View\Components\forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInputReq extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id = '',
        public string $label = '',
        public string $type = 'text',
        public string $placeholder = '',
        public string $value = '',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.form-input-req');
    }
}
