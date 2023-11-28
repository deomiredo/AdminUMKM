<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css?v=3.2.0">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login Penjual UMKM</a>
        </div>
        @if (session()->has('message'))
                <div class="col mb-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <p class="card-text">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('auth.penjual') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control " placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('username')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="PIN" name="pin">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('pin')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('login') }}" class="btn btn-white btn-block">Login Admin</a>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>


    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>

    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('admin') }}/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
