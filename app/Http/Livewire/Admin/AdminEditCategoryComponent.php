<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
     public $category_slug, $category_id, $name, $slug;
     public function mount($category_slug)
     {
        $this->category_slug = $category_slug;
        $category = Catagory::where('slug',$category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
     }
     public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updateCategory()
    {
        $category = Catagory::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success_message','Category has been Updated Successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
