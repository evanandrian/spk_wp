<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Input Nilai Bobot Alternatif</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="{{ route('insertnilaialternatif') }}">
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
                                            <label>Atribut <span class="text-danger">*</span></label>
                                            <select class="form-control" name="atribut" id="id">
                                                <option value="0"> SELECT </option>
                                                @foreach($atribut as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->atribut }}</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
