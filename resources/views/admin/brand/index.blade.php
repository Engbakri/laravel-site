<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Brands
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-8 mt-5">
                <div class="card">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-header">
                      All Brands
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <th>ID</th>
                              <th>Brand Name</th>
                              <th>Brand Image</th>
                              <th>Created at</th>
                              <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($brands as $index=>$brand)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src="{{ $brand->brand_image }}" style="height: 40px;width:40px;"/></td>
                                    <td>{{ $brand->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('brands.edit',$brand->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('brands.delete',$brand->id)}}" class="btn btn-danger" onclick="return confirm('Are you want Detete brand')">Delete</a>
                                    </td>

                                    </tr>
                                </tr>
                                @endforeach
                             
                            </tbody>
                          </table>
                    </div>
                    <div class="card-footer">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
            <div class="col-4 mt-5">
                <div class="card">
                    <div class="card-header">
                      Add Brand 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
                                <input type="text" name="brand_name" class="form-control"  placeholder="Enter Brand Name">
                            </div>
                            <div class="mb-3">
                                @error('brand_name')
                                    <span class="text-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                @error('brand_image')
                                    <span class="text-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>

  
</x-app-layout>
