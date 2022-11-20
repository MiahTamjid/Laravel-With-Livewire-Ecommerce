<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search, $product_cat, $product_cat_id;

    public function mount()
    {
        $this->product_cat = 'All Category';
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function render()
    {   
        $categories = Catagory::all();
        return view('livewire.header-search-component',['categories'=>$categories]);
    }
}
