<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
   
    public function __construct(
         public ?string $value = null,
        public ?string $name = null,
        public ?string $placeholder = null,
        public ?string $formRef = null,
        public ?string $type = "text",
        public ?string $fileType = null,
        public ?bool $required = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.text-input');
    }
}
