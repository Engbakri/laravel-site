<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Coders Group - Home</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  @include('layouts.include.head')
  
</head>

<body>

    @include('layouts.include.header')


        <main id="main">

             @yield('content')

        </main><!-- End #main -->


    @include('layouts.include.footer')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    @include('layouts.include.script')

</body>

</html>