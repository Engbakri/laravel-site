@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Contact</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('contacts.update',$contact->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> Phone </label>
                            <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control"  placeholder="Enter Phone">
                            
                        </div>
            
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Address </label>
                            <input type="text" value="{{ $contact->address }}" class="form-control" name="address" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                              <input type="email" value="{{ $contact->email }}" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update Contact</button>
                            <a href="{{ route('contacts')}}" type="submit" class="btn btn-secondary btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>   
@endsection


