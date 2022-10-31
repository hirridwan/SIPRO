<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="turbolinks-root">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/logoweb.png')}}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- CSS Libraries -->
    @stack('css_libraries')


    <!-- Template CSS -->
    @stack('template_css')
    <link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
    <!-- page_specific_css -->
    @stack('page_specific_css')
    
    <style>
        .loader {
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }
        
        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }   
    </style>

    @stack('page_specific_js_head')
    @livewireStyles
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <livewire:app.navbar/>

            <livewire:app.sidebar/>

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('section-header')</h1>
                    </div>
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
    <livewire:scripts/>  

    <!-- General JS Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>  
    <script src="{{asset('stisla/js/stisla.js')}}"></script>

    <!-- JS Libraies -->

    @stack('js_libraries')


    <!-- Template JS File -->
    <script src="{{asset('stisla/js/scripts.js')}}"></script>
    <script src="{{asset('stisla/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    @stack('page_specific_js')
    {{-- <script src="{{asset('stisla/js/page/modules-toastr.js')}}"></script> --}}
    <script>
        function rupiahFormat(angka)
        { 
            let number = angka.toString().replace(/[^,\d]/g, '').toString(),
            split = number.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0,sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if(ribuan)
            {
            separator = sisa ? '.' : '';
            rupiah += separator+ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }
    </script>
    <script>
        window.addEventListener('swal:redirect-page',event=>{
                swal({
                    title:event.detail.title,
                    text:event.detail.text,
                    icon:event.detail.type,
                    buttons:true,
                    dangerMode:true
                }).then((willDelete)=>{
                if(willDelete){
                    window.livewire.emit(event.detail.routeDestination);
                }
                });
            });
        window.addEventListener('swal:confirm-delete',event=>{
                swal({
                    title:event.detail.title,
                    text:event.detail.text,
                    icon:event.detail.type,
                    buttons:true,
                    dangerMode:true
                }).then((willDelete)=>{
                if(willDelete){
                    window.livewire.emit('delete',event.detail.id);
                }
                });
            });
        window.addEventListener('swal:confirm',event=>{
            swal({
                title:event.detail.title,
                text:event.detail.text,
                icon:event.detail.type,
                buttons:true,
                dangerMode:true
            }).then((willDelete)=>{
                window.livewire.emit('logout');
            });
        });
        
        window.addEventListener('swal:modal',event=>{
            swal({
                title:event.detail.title,
                text:event.detail.text,
                icon:event.detail.type,
            });
        });
    </script>
</body>