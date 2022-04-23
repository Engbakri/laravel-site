<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Brands
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-8">
              
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    
                        <div class="card-group">
                            @foreach ($BrandImages as $image)
                                <div class="col-md-4 mt-5">
                                    <div class="card">
                                        <img  src="{{ asset($image->image)}}">
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                    </div>

            <div class="col-4 mt-5">
                <div class="card">
                    <div class="card-header">
                      Add Brand Images
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.storeimages') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Brand Image</label>
                                <input type="file" name="image[]" class="form-control" multiple="">
                            </div>
                            <div class="mb-3">
                                @error('image')
                                    <span class="text-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Images</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>

  
</x-app-layout>
