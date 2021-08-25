<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

<!-- Form-->
<div class="form">
    <div class="form-panel one">
        <div class="form-header" style="margin-top: -50px">
            <h1>Account Login</h1>
        </div>
        <div class="form-content" style="margin-top: -30px">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="card-body">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="username">Nama User</label>
                    <input type="text" id="namauser" name="namauser" required="required" placeholder="Nama User"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required="required" placeholder="Password"/>
                </div>
                <div class="form-group">
{{--                    <label class="form-remember">--}}
{{--                        <input type="checkbox"/>Remember Me--}}
{{--                    </label><a class="form-recovery" href="#">Forgot Password?</a>--}}
                </div>
                <div class="form-group">
                    <button type="submit">Log In</button>
                    <p class="text-center" style="margin-left: 100px">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!</p>
                </div>
            </form>
        </div>
    </div>
    <div class="form-panel two"></div>
</div>
</body>
</html>
