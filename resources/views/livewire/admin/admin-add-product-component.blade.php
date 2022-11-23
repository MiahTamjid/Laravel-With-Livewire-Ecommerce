<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                            </div>
                        
                        </div>
                    </div>
                    <div class="panel-body" >
                        @if (Session::has('success_message'))
                        <div class="alert alert-success" role="alertsuccess_message">{{ Session::get('success_message') }}</div>
                            
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-6 control-label" >Product Name: </label>
                                <div class="col-md-4" >
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Product Slug: </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Short Description: </label>
                                <div class="col-md-4">
                                    <textarea cols="30" rows="10" class="form-control" placeholder="Short Description" wire:model="short_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Description: </label>
                                <div class="col-md-4">
                                    <textarea cols="30" rows="10" class="form-control" placeholder="Description" wire:model="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Regular Price: </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Sale Price: </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >SKU: </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Stock: </label>
                                <div class="col-md-4">
                                    <select name="" id="" wire:model="stock_status">
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Featured: </label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Quantity: </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Product Image: </label>
                                <div class="col-md-4">
                                    <input type="file" class=" input-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" >Category: </label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label"></label>
                                <div class="col-md-4" style="padding-top: 10px">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
