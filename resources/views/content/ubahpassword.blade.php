@error('current_password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Ubah Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('profile.change.password')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12">
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
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="current_password">Password Lama</label>
                                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                                           placeholder="Masukkan Password Saat Ini">
                                                    @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="new_password ">Password Baru</label>
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                                           placeholder="Masukan Password Baru">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="confirm_password">Konfirmasi Password Baru</label>
                                                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="Masukkan Kembali Password Baru">
                                                    @error('confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-first mt-4 ml-2">
                                                <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
