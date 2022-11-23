<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name, $slug, $short_description, $description, $regular_price, $sale_price;
    public $SKU, $stock_status, $featured, $quantity, $image, $category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }
    public function addProduct()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);

        $product->image = $imageName;
        $product->catagory_id = $this->category_id;

        $product->save();
        session()->flash('success_message','Product has been Added Successfully!');

    }
    public function render()
    {
        $categories = Catagory::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
    
}
