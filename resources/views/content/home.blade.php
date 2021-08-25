<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <p class="bmd-label-floating">Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></p>
                                        <a href="{{ route('logout') }}" class="btn btn-danger" style="margin-top: 20px">Logout</a>
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
