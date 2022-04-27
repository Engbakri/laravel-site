@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               
                <div class="card">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-header">
                      Contact Message
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Subject</th>
                              <th>Email</th>
                              <th>Message</th>
                              <th>Created at</th>
                              <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index=>$contact)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('contactmessage.delete',$contact->id)}}" class="btn btn-danger" onclick="return confirm('Are you want Detete brand')">Delete</a>
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
