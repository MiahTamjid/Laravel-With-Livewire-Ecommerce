<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use App\Models\Product;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;
class ShopComponent extends Component
{
    public $sorting, $pagesize;
    public $min_price=1;
    public $max_price=1000;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        if($this->sorting=='date')   
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);  
        }
        else if($this->sorting=="price")
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize); 
        }
        else if($this->sorting=="price-desc")
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize); 
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);  
        }   
        
        $catagories = Catagory::all();  
        
        return view('livewire.shop-component',['products'=> $products,'catagories'=>$catagories])->layout("layouts.base");
    }
    
}
