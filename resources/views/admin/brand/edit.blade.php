<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Brands
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-header">
                      Edit Brand
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
                                <input type="text" value="{{ $brand->brand_name}}" name="brand_name" class="form-control"  placeholder="Enter Brand Name">
                            </div>
                            <div class="mb-3">
                                @error('category_name')
                                    <span class="alert alert-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Brand Image</label>
                                <input type="file" value="{{ $brand->brand_image}}" name="brand_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                @error('category_name')
                                    <span class="alert alert-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset($brand->brand_image)}}" style="height: 200px;width:200px;">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Edit Brand</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>

  
</x-app-layout>
