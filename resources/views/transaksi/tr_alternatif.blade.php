<div class="container">
    <div class="page-header">
        <h1>Tambah Alternatif</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{route('insertalternatif')}}">
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
                    <label>Id <span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="id" value="" disabled="true"/>
                </div>
                <div class="form-group">
                    <label>Kode <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kode" value=""/>
                </div>
                <div class="form-group">
                    <label>Nama Alternatif <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama" value=""/>
                </div><div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="{{ route('tr_alternatif') }}"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
