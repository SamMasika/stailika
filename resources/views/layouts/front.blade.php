
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
  @yield('title')
  </title>

  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
{{-- Font-awesome --}}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
<!-- CSS Files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{asset('frontend/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <link href="{{asset('frontend/assets/css/custom.css')}}" rel="stylesheet" />
  {{-- <link href="{{asset('frontend/assets/css/b5.css')}}" rel="stylesheet" /> --}}
  {{-- owl-crousel --}}
  <link href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <style>
    a{
      text-decoration: none !important;
      
    }
  </style>
</head>

<body class="">
  
 @include('layouts.frontinc.nav')
 
      <div class="content">
        @yield('content')
      </div>
     
  <!--   Core JS Files   -->
  <script src="{{asset('frontend/assets/js/plugins/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/core/bootstrap-material-design.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  {{-- <script src="{{asset('frontend/assets/js/plugins/b5.js')}}"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="{{asset('frontend/assets/js/plugins/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/plugins/custom.js')}}"></script>
  <script src="{{asset('frontend/assets/js/plugins/checkout.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  @if(session('status'))
  <script>
 swal("{{session('status')}}");
  </script>
 @endif
 
 @yield('scripts')
 
</body>

</html>