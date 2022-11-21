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
                    <div class="row">
                        <div class="col-md-6">All Category</div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addcategories') }}" class="btn btn-success pull-right">Add New</a>
                        </div>
                    </div>
                    <div class="panel-body">
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
                                    <td></td>
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
