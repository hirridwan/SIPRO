<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; SIPRO</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
  @stack('page_specific_css')
  @livewireStyles
</head>

<body>


    @yield('content')

  {{-- <script src="{{asset('js/izitoast/dist/js/iziToast.min.js')}}"></script> --}}
  <script src="{{asset('js/app.js')}}"></script>
 <!-- General JS Scripts -->
 `<script src="{{asset('stisla/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <!-- Template JS File -->
  <script src="{{asset('stisla/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  @livewireScripts
  @stack('page_specific_js')
  <script>
      window.addEventListener('swal:modal',event=>{
        swal({
            title:event.detail.title,
            text:event.detail.text,
            icon:event.detail.type,
        });
      });
  </script>
</body>
</html>
