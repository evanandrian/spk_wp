<div class="container">
    <div class="page-header">
        <h1>Alternatif</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <form class="form-inline" method="get" action="{{ route('getdataalternatif') }}">
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
                <input type="hidden" name="m" value="alternatif" />
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Pencarian. . ." name="alternatif" value="" />
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Refresh</button>
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <a class="btn btn-primary" href="{{ route('tambah_alternatif') }}"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <a class="btn btn-default" href="{{route('cetak_alternatif')}}" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $i = 0 ?>
            @foreach($alternatif as $item)
                <?php $i++ ?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->kode}}</td>
                    <td>{{$item->alternatif}}</td>
                    <td>{{$item->keterangan}}</td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="{!! route('update_alternatif',['id' => $item->id ]) !!}"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="{!! route('delete_alternatif',['id' => $item->id ]) !!}" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
