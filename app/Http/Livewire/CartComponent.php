<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);

    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);

    }
    public function deleteProduct($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been Removed!');
    }
    public function deleteProductAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success_message','All Item has been Removed!');
    }

}
