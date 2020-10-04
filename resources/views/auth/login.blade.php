<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

    <title>Sistem Informasi Perumahan Kabupaten Banjar</title>

    <link rel="stylesheet" href="../lib/fontawesome/css/font-awesome.css">

    <link rel="stylesheet" href="../css/quirk.css">

    <script src="../lib/modernizr/modernizr.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body class="signwrapper">

    <div class="sign-overlay"></div>
    <div class="signpanel"></div>

    <div class="panel signin">
        <div class="panel-heading">
            <h1><b>SIRUMBA</b></h1>
            <h4 class="panel-title">Selamat Datang, Silakan Login.</h4>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text"class="form-control form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus" id="default-01" placeholder="Username">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group nomargin">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Masukkan password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                </div>
                <div><a href="" class="forgot">Lupa password?</a></div>
                <div class="form-group">
                    <button class="btn btn-success btn-quirk btn-block">MASUK</button>
                </div>
            </form>
            <hr class="invisible">
            {{-- <div class="form-group">
                <a href="signup.html"
                    class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Not a member? Sign
                    up now!</a>
            </div> --}}
        </div>
    </div><!-- panel -->

</body>

</html>