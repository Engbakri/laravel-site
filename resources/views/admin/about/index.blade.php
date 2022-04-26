@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <a href="{{ route('abouts.create')}}" class="btn btn-primary mb-2">Add About</a>
                <div class="card">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-header">
                      About Page 
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <th>ID</th>
                              <th>Title</th>
                              <th> Short Description</th>
                              <th> Long Description</th>
                              <th>Created at</th>
                              <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $index=>$about)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $about->about_title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($about->short_desc, 40, $end='...') }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($about->long_desc, 40, $end='...') }}</td>
                                    <td>{{ $about->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('abouts.edit',$about->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('abouts.delete',$about->id)}}" class="btn btn-danger" onclick="return confirm('Are you want Detete brand')">Delete</a>
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
