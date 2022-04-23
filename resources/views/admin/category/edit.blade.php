<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-header">
                      Edit Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                <input type="text" value="{{ $category->category_name}}" name="category_name" class="form-control"  placeholder="Enter Category Name">
                            </div>
                            <div class="mb-3">
                                @error('category_name')
                                    <span class="alert alert-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Edit Category</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>

  
</x-app-layout>
