<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxStock implements ValidationRule
{
    private $maxStock;

    public function __construct($maxStock)
    {
        $this->maxStock = $maxStock;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value > $this->maxStock) {
            $fail("The $attribute must be less than or equal to $this->maxStock.");
        }
    }
}
