<div class="container">
    <style>
        .text-primary{font-weight: bold;}
    </style>
    <div class="page-header">
        <h1>Perhitungan</h1>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Masukkan Nilai Kepentingan</strong></div>
        <div class="panel-body oxa">
            <form method="post" action="{{route('hitungHasilSPK')}}">
                @csrf
                <input type="hidden" value="1" name="ok" />
                <table class="table table-bordered table-striped table-hover">
                    <thead><tr>
                        <th>Kriteria</th>
                        <td>Kriteria 1</td>
                        <td>Kriteria 2</td>
                        <td>Kriteria 3</td>
                        <td>Kriteria 4</td>
                        <td>Kriteria 5</td>
                        <td>Kriteria 6</td>
                    </tr></thead>
                    <tr>
                        <th>Kepentingan</th>
                        <td><input class="form-control input-sm" type="text" name="c1" value="" /></td>
                        <td><input class="form-control input-sm" type="text" name="c2" value="" /></td>
                        <td><input class="form-control input-sm" type="text" name="c3" value="" /></td>
                        <td><input class="form-control input-sm" type="text" name="c4" value="" /></td>
                        <td><input class="form-control input-sm" type="text" name="c5" value="" /></td>
                        <td><input class="form-control input-sm" type="text" name="c6" value="" /></td>
                    </tr>
                </table>
                <button class="btn btn-primary">Hasil Analisa</button>
            </form>
        </div>
    </div>
    @if($hasil)
    @section('$hasil')
    <div class="panel panel-primary" id="hasil">
        <div class="panel-heading"><strong>Bobot Kepentingan</strong></div>
        <div class="panel-body oxa">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
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
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Hasil Analisa</strong></div>
        <div class="panel-body oxa">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
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
                        <td>{{$items->c4}}</td>
                        <td>{{$items->c5}}</td>
                        <td>{{$items->c6}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Vektor S &amp; Vektor V</strong></div>
        <div class="panel-body oxa">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Vektor S</th>
                    <th>Vektor V</th>
                </tr>
                </thead>
                <tbody>
                <?php $e = 0 ?>
                @foreach($vektor as $itemss)
                    <?php $e++ ?>
                    <tr>
                        <td>{{$e}}</td>
                        <td>{{$itemss['alternatif']}}</td>
                        <td>{{$itemss['vektors']}}</td>
                        <td>{{$itemss['vektorv']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Perangkingan</strong></div>
        <div class="panel-body oxa">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Total</th>
                    <th>Rank</th>
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
            <a class="btn btn-default" href="{{route('cetak_hasil')}}" target="_blank"><span class="glyphicon glyphicon-plus"></span> Cetak</a>
            <a class="btn btn-success" href="{{ route('perhitungan') }}"><span class="glyphicon glyphicon-refresh"></span>Refresh</a>
        </div>
    </div>
    @show
    @endif
</div>
