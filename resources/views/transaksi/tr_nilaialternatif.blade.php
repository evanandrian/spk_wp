<div class="container">
    <div class="page-header">
        <h1>Input Nilai Bobot</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{ route('insertnilaialternatif') }}">
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
                    <label>Id</label>
                    <input class="form-control" type="text" name="id" value="" readonly />
                </div>
                <div class="form-group">
                    <label>Kode<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kode" value="" />
                </div>
                <div class="form-group">
                    <label>Alternatif <span class="text-danger">*</span></label>
                    <select class="form-control" name="alternatif" id="id">
                        <option value="0"> SELECT </option>
                        @foreach($alternatif as $item)
                        <option value="{{ $item->id }}"> {{ $item->alternatif }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kriteria 1</label>
                    <input class="form-control" type="text" name="c1" value="" />
                </div>
                <div class="form-group">
                    <label>Kriteria 2</label>
                    <input class="form-control" type="text" name="c2" value="" />
                </div>
                <div class="form-group">
                    <label>Kriteria 3</label>
                    <input class="form-control" type="text" name="c3" value="" />
                </div>
                <div class="form-group">
                    <label>Kriteria 4</label>
                    <input class="form-control" type="text" name="c4" value="" />
                </div>
                <div class="form-group">
                    <label>Kriteria 5</label>
                    <input class="form-control" type="text" name="c5" value="" />
                </div>
                <div class="form-group">
                    <label>Kriteria 6</label>
                    <input class="form-control" type="text" name="c6" value="" />
                </div>
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="{{ route('nilaialternatif') }}"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </form>
        </div>
    </div>
</div>
