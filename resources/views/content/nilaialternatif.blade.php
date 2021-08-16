<div class="container">
    <div class="page-header">
        <h1>Nilai Bobot Alternatif</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <form class="form-inline" method="get" action="">
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
                <input type="hidden" name="m" value="rel_alternatif" />
                <div class="form-group" style="margin-left: 10px">
                    <input class="form-control" type="text" name="q" value="" />
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <a class="btn btn-primary" href="{{ route('tambah_nilaialternatif') }}"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-default" href="#" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</button>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>A1</td>
                <td>Alternatif 1</td>
                <td>3500</td><td>70</td><td>10</td><td>80</td><td>3000</td><td>36</td>    <td>
                    <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=A01"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="#" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
