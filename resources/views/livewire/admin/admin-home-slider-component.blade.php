<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success pull-right">Add New Slide</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                        <div class="alert alert-success" role="alertsuccess_message">{{ Session::get('success_message') }}</div>
                            
                        @endif
                        <table class="table tavle-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td><img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" width="120" alt=""></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->subtitle }}</td>
                                    <td>{{ $slider->price }}</td>
                                    <td>{{ $slider->link }}</td>
                                    <td>{{ $slider->status == 1 ? 'Active':'inactive' }}</td>
                                    <td>{{ $slider->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.edithomeslider',['slide_id'=>$slider->id]) }}">
                                        <i class="fa fa-edit fa-2x text-info"></i>
                                    </a>
                                    <a href="" wire:click.prevent="deleteSlide({{ $slider->id }})" style="margin-left: 10px">
                                        <i class="fa fa-times fa-2x text-danger"></i>
                                    </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
