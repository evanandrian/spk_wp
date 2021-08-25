<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Input Kriteria</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="{{ route('insertkriteria') }}">
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
                                            <input class="form-control" type="text" name="id" value="" disabled="true"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="kode" value=""/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kriteria <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="nama" value=""/>
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
                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                                            <a class="btn btn-danger" href="{{ route('tr_kriteria') }}"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
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
