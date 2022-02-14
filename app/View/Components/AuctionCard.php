<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuctionCard extends Component
{
    public $auction;
    public $image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($auction, $image)
    {
        $this->auction = $auction;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.auction-card');
    }
}
