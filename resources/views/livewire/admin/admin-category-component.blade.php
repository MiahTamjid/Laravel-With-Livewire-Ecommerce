<div>
    <style>
        nav svg{
            height: 10px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">All Category</div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addcategories') }}" class="btn btn-success pull-right">Add New</a>
                        </div>
                    </div>
                </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                        <div class="alert alert-success" role="alertsuccess_message">{{ Session::get('success_message') }}</div>
                            
                        @endif
                        <table class="table table-hover" >
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.editcategories',['category_slug'=>$category->slug]) }}">
                                        <i class="fa fa-edit" style="font-size: 25px;"></i>
                                        </a>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                         {{ $categories->links() }}
                </div>
         </div>
      </div>
    </div>    
</div>
</div>

