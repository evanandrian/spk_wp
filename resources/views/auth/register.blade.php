<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/spkwp.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        <div class="card" style="margin-top: 50px">
            <div class="card-header">
                <h3 class="text-center">Register</h3>
            </div>
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
{{--                    <div class="form-group">--}}
{{--                        <label for=""><strong>Nama Lengkap</strong></label>--}}
{{--                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for=""><strong>Nama User</strong></label>
                        <input type="text" name="namauser" class="form-control" placeholder="Nama User">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Konfirmasi Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<footer class="footer bg-primary">
    <div class="container">
        <p>Copyright &copy; 2021 SarjanaKomedi.com</p>
    </div>
</footer>
</html>
