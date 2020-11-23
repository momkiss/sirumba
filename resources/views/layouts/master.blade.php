<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

    <title>SISTEM INFORMASI PERUMAHAN BANJAR</title>

    <link rel="stylesheet" href="{{ asset('lib/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/Hover/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/weather-icons/css/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/jquery-toggles/toggles-full.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quirk.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/timepicker/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('lib/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.css') }}">
   <link rel="stylesheet" href="{{ asset('lib/jquery.gritter/jquery.gritter.css') }}">
   <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('css')

    <script src="{{ asset('lib/modernizr/modernizr.js') }}"></script>

    <script>
        var BASE_URL = {!! json_encode(url('/')) !!};
    </script>
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body>

    <!-- Loading Spinner Wrapper-->
<div class="loader text-center" style="display: none">
    <div class="loader-inner">

        <!-- Animated Spinner -->
        <div class="lds-roller mb-3">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        
        <!-- Spinner Description Text [For Demo Purpose]-->
        <h4 class="text-uppercase font-weight-bold">Loading</h4>
    </div>
</div>
@if(Route::current()->getName() != 'index')
    @include('layouts.header')
        <section>
            @include('layouts.sidebar')
            @endif
            <div class="mainpanel">
                <div class="contentpanel">
                    @yield('content')
                </div>
            </div>
        </section>
</section>

@include('layouts.scripts')
@yield('scripts')

