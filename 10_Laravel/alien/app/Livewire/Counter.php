<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Counter extends Component
{
    public $count = 0;
    
    public function increment()
    {
        $this->count++;
        // Developer-driven increment. Much more reliable than user stories.
    }
    
    public function decrement()
    {
        $this->count--;
        // If only fixing bugs was this easy...
    }
    
    public function render()
    {
        return view('livewire.counter');
    }
}