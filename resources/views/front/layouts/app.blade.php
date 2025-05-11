<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel online Book Store</title>
  <link rel="icon" href="{{ asset('./front-assets/images/logo34.png') }}" type="image/x-icon"/>
  <link rel="stylesheet" href="{{ asset('front-assets/css/vendors/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('front-assets/css/vendors/bootstrap.rtl.min.css') }}">
  <link rel="stylesheet" href="{{ asset('front-assets/css/vendors/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('front-assets/css/vendors/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('front-assets/css/main.min.css') }}">
</head>
<body>
    @include('front.partials.header')

<main>
    @yield('content')
</main> 
@include('front.partials.footer')


 <script src="{{ asset('front-assets/js/vendors/all.min.js') }}"></script>
 <script src="{{ asset('front-assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('front-assets/js/vendors/jquery-3.7.0.js') }}"></script>
 <script src="{{ asset('front-assets/js/vendors/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('front-assets/js/main.js') }}"></script>
 <script src="{{ asset('front-assets/js/app.js') }}"></script>
</body>

</html>

