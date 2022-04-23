<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
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
                      All Categories
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <th>ID</th>
                              <th>Name</th>
                              <th>User</th>
                              <th>Created at</th>
                              <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index=>$category)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user_id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('categories.delete',$category->id)}}" class="btn btn-danger">Delete</a>
                                    </td>

                                    </tr>
                                </tr>
                                @endforeach
                             
                            </tbody>
                          </table>
                    </div>
                    <div class="card-footer">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
            <div class="col-4 mt-5">
                <div class="card">
                    <div class="card-header">
                      Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control"  placeholder="Enter Category Name">
                            </div>
                            <div class="mb-3">
                                @error('category_name')
                                    <span class="alert alert-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>

  
</x-app-layout>
