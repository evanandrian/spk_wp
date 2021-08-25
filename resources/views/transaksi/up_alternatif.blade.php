<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update Alternatif</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="{{route('insertalternatif')}}">
                                        @csrf
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
                                        <div class="form-group">
                                            <label>Id <span class="text-danger"></span></label>
                                            <input class="form-control" type="text" name="id" value="{!! ($data->id) !!}" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="kode" value="{!! ($data->kode) !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Alternatif <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="nama" value="{!! ($data->alternatif) !!}"/>
                                        </div><div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="keterangan">{!! ($data->keterangan) !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                                            <a class="btn btn-danger" href="{{ route('tr_alternatif') }}"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
