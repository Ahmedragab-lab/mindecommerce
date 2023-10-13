<?php

namespace App\Http\Livewire\Frontend;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Home extends Component
{
    public function render()
    {
        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
          }
        $categorys = ProductCategory::whereStatus(1)->whereNull('parent_id')->get();
        // dd($categorys);
        return view('livewire.frontend.home',compact('categorys'))->layout('layouts.master');
        // return view('layouts.master');
    }
}
