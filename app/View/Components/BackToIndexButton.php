<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackToIndexButton extends Component
{
    /**
     * The index URL.
     *
     * @var string
     */
    public string $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.back-to-index-button');
    }
}
