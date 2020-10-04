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
@if(Route::current()->getName() != 'index')
    @include('layouts.header')
        <section>
                @include('layouts.sidebar')
            @endif
            <div class="mainpanel">
                <div class="contentpanel">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    
                    @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    
                    @if ($message = Session::get('info'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Please check the form below for errors
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </section>
</section>
@yield('scripts')
@include('layouts.scripts')

