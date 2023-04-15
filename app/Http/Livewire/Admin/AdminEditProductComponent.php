<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
     use WithFileUploads;
     public $name, $slug, $short_description, $description, $regular_price, $sale_price;
     public $SKU, $stock_status, $featured, $quantity, $image, $category_id, $newimage, $product_id;

     public function mount($product_slug)
     {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured =  $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->catagory_id;
        $this->product_id = $product->id;
        
        
     }
     public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
{
$this->validateOnly($fields,[
'name' => 'required',
'slug' => 'required|unique:products',
'short_description' => 'required',
'description' => 'required',
'regular_price' => 'required|numeric',
'sale_price' => 'numeric',
'SKU' => 'required',
'stock_status' => 'required',
'quantity' => 'required|numeric',
'newimage' => 'required|mimes:jpeg,png',
'category_id' => 'required'
]);
}

    public function updateProduct()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',            
            'quantity' => 'required|numeric',
            'newimage' => 'required|mimes:jpeg,png',
            'category_id' => 'required'                 
        ]);
        
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }

        $product = Product::find($this->product_id);
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

        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        $product->catagory_id = $this->category_id;

        $product->save();
        session()->flash('success_message','Product has been Updated Successfully!');
    }
    public function render()
    {
        $categories = Catagory::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
