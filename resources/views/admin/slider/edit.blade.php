@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Slider</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('sliders.update',$slider->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $slider->image }}">
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> Slider Title</label>
                            <input type="text" name="title" value="{{ $slider->title}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter title">
                            
                        </div>
            
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description </label>
                            <textarea name="description" class="form-control"  rows="3">{{ $slider->title}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Selider Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                        <img src="{{ asset($slider->image)}}" style="height: 200px;width:200px;">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update Slider</button>
                            <a href="{{ route('sliders')}}" type="submit" class="btn btn-secondary btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>   
@endsection


