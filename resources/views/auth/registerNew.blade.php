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
<div class="form">
    <div class="form-panel one">
        <div class="form-header" style="margin-top: -50px">
            <h1>Register Account</h1>
        </div>
        <div class="form-content" style="margin-top: -30px">
            <form action="{{ route('register') }}" method="post">
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
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="namauser" name="namauser" required="required"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required="required"/>
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required="required"/>
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                    <p class="text-center" style="margin-left: 100px;margin-bottom: -50px;">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p>
                </div>
            </form>
        </div>
    </div>
    <div class="form-panel two"></div>
</div>
</body>
</html>
