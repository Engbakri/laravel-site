@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <a href="{{ route('sliders.create')}}" class="btn btn-primary mb-2">Add Slider</a>
                <div class="card">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-header">
                      All Sliders
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <th>ID</th>
                              <th>Title</th>
                              <th> Description</th>
                              <th> Image</th>
                              <th>Created at</th>
                              <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $index=>$slider)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($slider->description, 40, $end='...') }}</td>
                                    <td><img src="{{ $slider->image }}" style="height: 40px;width:40px;"/></td>
                                    <td>{{ $slider->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('sliders.edit',$slider->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('sliders.delete',$slider->id)}}" class="btn btn-danger" onclick="return confirm('Are you want Detete brand')">Delete</a>
                                    </td>

                                    </tr>
                                </tr>
                                @endforeach
                             
                            </tbody>
                          </table>
                    </div>
                    <div class="card-footer">
                        {{-- {{ $sliders->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
