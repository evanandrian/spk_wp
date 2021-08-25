<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Perhitungan</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('hitungHasilSPK')}}">
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
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td><b>Kriteria</b></td>
                                                <td>Kriteria 1</td>
                                                <td>Kriteria 2</td>
                                                <td>Kriteria 3</td>
                                                <td>Kriteria 4</td>
                                                <td>Kriteria 5</td>
                                                <td>Kriteria 6</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Kepentingan</b></td>
                                                <td><input class="form-control input-sm" type="text" name="c1" value="" /></td>
                                                <td><input class="form-control input-sm" type="text" name="c2" value="" /></td>
                                                <td><input class="form-control input-sm" type="text" name="c3" value="" /></td>
                                                <td><input class="form-control input-sm" type="text" name="c4" value="" /></td>
                                                <td><input class="form-control input-sm" type="text" name="c5" value="" /></td>
                                                <td><input class="form-control input-sm" type="text" name="c6" value="" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary">Hasil Analisa</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if($hasil)
                @section('$hasil')
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0">Bobot Kepentingan</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                        <tr>
                                            <td>No</td>
                                            <td>Kriteria</td>
                                            <td>Kriteria 1</td>
                                            <td>Kriteria 2</td>
                                            <td>Kriteria 3</td>
                                            <td>Kriteria 4</td>
                                            <td>Kriteria 5</td>
                                            <td>Kriteria 6</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0 ?>
                                        @foreach($bobot as $item)
                                            <?php $i++ ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$item['kriteria']}}</td>
                                                <td>{{$item['kriteria1']}}</td>
                                                <td>{{$item['kriteria2']}}</td>
                                                <td>{{$item['kriteria3']}}</td>
                                                <td>{{$item['kriteria4']}}</td>
                                                <td>{{$item['kriteria5']}}</td>
                                                <td>{{$item['kriteria6']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0">Hasil Analisa</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                        <tr>
                                            <td>No</td>
                                            <td>Kriteria</td>
                                            <td>Kriteria 1</td>
                                            <td>Kriteria 2</td>
                                            <td>Kriteria 3</td>
                                            <td>Kriteria 4</td>
                                            <td>Kriteria 5</td>
                                            <td>Kriteria 6</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $z = 0 ?>
                                        @foreach($hasilanalisa as $items)
                                            <?php $z++ ?>
                                            <tr>
                                                <td>{{$z}}</td>
                                                <td>{{$items->alternatif}}</td>
                                                <td>{{$items->c1}}</td>
                                                <td>{{$items->c2}}</td>
                                                <td>{{$items->c3}}</td>
                                                <td>{{$items->c4}}</td>
                                                <td>{{$items->c5}}</td>
                                                <td>{{$items->c6}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0">Vektor S & Vektor V</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                        <tr>
                                            <td>No</td>
                                            <td>Alternatif</td>
                                            <td>Vektor S</td>
                                            <td>Vektor V</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $z = 0 ?>
                                        @foreach($vektor as $itemss)
                                            <?php $z++ ?>
                                            <tr>
                                                <td>{{$z}}</td>
                                                <td>{{$itemss['alternatif']}}</td>
                                                <td>{{$itemss['vektors']}}</td>
                                                <td>{{$itemss['vektorv']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0">Rangking</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                        <tr>
                                            <td>No</td>
                                            <td>Kriteria</td>
                                            <td>Total</td>
                                            <td>Rank</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $a = 0 ?>
                                        @foreach($rank as $itemss)
                                            <?php $a++ ?>
                                            <tr>
                                                <td>{{$a}}</td>
                                                <td>{{$itemss->judul}}</td>
                                                <td>{{$itemss->vektorv}}</td>
                                                <td>{{$itemss->rangking}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-default" href="{{route('cetak_hasil')}}" target="_blank"><span class="glyphicon glyphicon-plus"></span>&nbsp; Cetak</a>
                    <a class="btn btn-success" href="{{ route('perhitungan') }}"><span class="glyphicon glyphicon-refresh"></span>&nbsp; Refresh</a>
                </div>
                @show
                @endif
            </div>
        </div>
    </div>
</div>
