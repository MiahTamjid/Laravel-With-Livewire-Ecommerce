<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name, $slug;
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
{
	$this->validateOnly($fields,[
		'name' => 'required',
		'slug' => 'required|unique:catagories'
	]);
}
    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:catagories'
        ]); 

        $category =new Catagory();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success_message','Category has been created Successfully!');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
