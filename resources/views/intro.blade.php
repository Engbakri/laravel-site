<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
      <div class="px-4 py-5 my-5 text-center">
  
    <h1 class="display-5 fw-bold">Welcome to our Store</h1>

    <h4> {{ $search ?? ' ' }}</h4> 
  
    <div class="col-lg-6 mx-auto">
    <form action="{{ url('/search')}}" method="post" enctype="multipart/form-data" >
    @csrf
      
  <input type="text" name="search"  class="form-control mb-2" placeholder="search our products">
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="submit" class="btn btn-primary btn-lg px-4 gap-3" type="submit">Search</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Home</button>
      </div>
        </form>
    </div>
  </div>
    </body>
</html>
