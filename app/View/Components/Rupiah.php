<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rupiah extends Component
{
    /**
     * Create a new component instance.
     */

    public int $nominal;

    public function __construct(int $nominal)
    {
        $this->nominal = $nominal;
    }

    public function formatUang(): string {
        return 'Rp' . number_format($this->nominal, 0, ',', '.');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rupiah');
    }
}