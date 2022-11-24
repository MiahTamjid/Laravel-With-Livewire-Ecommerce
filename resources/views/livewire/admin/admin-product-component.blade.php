<div>
    <style>
        nav svg{
            height: 70px;
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
                        <div class="col-md-6">
                            All Products
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New</a>
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
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock_status }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.editproduct',['product_slug'=>$product->slug]) }}">
                                            <i class="fa fa-edit" style="font-size: 25px;"></i>
                                        </a>
                                        <a href="" wire:click.prevent="deleteProduct({{ $product->id }})" style="margin-left: 10px">
                                            <i class="fa fa-times fa-2x text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                         {{ $products->links() }}
                </div>
         </div>
      </div>
    </div>    
</div>
</div>

