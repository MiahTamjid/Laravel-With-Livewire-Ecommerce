<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add new Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All Category</a>
                            </div>
                        
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                        <div class="alert alert-success" role="alertsuccess_message">{{ Session::get('success_message') }}</div>
                            
                        @endif
                        <form action="" class="from-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label class="col-md-6 control-label" style="padding-left: 400px">Catagory Name: </label>
                                <div class="col-md-4" style="padding-bottom: 10px">
                                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 control-label" style="padding-left: 400px">Catagory Slug: </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="slug" readonly>
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

