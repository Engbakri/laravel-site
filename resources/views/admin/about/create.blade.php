@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add About Content</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('abouts.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> About Title</label>
                            <input type="text" name="about_title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title">
                            
                        </div>
            
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Short Description </label>
                            <textarea name="short_desc" class="form-control"  rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Long Description </label>
                            <textarea name="long_desc" class="form-control"  rows="3"></textarea>
                        </div>
                
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Add About</button>
                            <a href="{{ route('abouts')}}" type="submit" class="btn btn-secondary btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>   
@endsection


