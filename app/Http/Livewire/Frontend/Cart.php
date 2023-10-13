<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
          }
        return view('livewire.frontend.cart')->layout('layouts.master');
    }
}
