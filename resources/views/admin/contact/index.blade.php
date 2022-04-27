@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <a href="{{ route('contacts.create')}}" class="btn btn-primary mb-2">Add Contact</a>
                <div class="card">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-header">
                      Contact Page 
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <th>ID</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Email</th>
                              <th>Created at</th>
                              <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index=>$contact)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('contacts.delete',$contact->id)}}" class="btn btn-danger" onclick="return confirm('Are you want Detete brand')">Delete</a>
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
