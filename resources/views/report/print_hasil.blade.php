
<!doctype html>
<html>
<link href="{{ asset('img/favicon.png') }}" rel="icon">
<link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
<head>
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
    <title>Cetak Laporan</title>
    <style>
        body{
            font-family: Verdana;
            font-size: 13px;
        }
        h1{
            font-size: 14px;
            border-bottom: 4px double #000;
            padding:3px 0;
        }
        table{
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        td, th{
            border: 1px solid #000;
            padding: 3px;
        }
        .wrapper{
            margin: 0 auto;
            width: 980px;
        }
    </style>
</head>
<body onload="window.print()">
<div class="wrapper">
    <h1>Perhitungan</h1>
    <strong>Bobot Kepentingan</strong>
    <table>
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
                <td>{{$item['nilai1']}}</td>
                <td>{{$item['nilai2']}}</td>
                <td>{{$item['nilai3']}}</td>
                <td>{{$item['nilai4']}}</td>
                <td>{{$item['nilai5']}}</td>
                <td>{{$item['nilai6']}}</td>
            </tr>
        @endforeach
        </tbody>
        </tbody>
    </table>

    <strong>Hasil Analisa</strong>
    <table>
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
                <td>{{$items->c3}}</td>
                <td>{{$items->c4}}</td>
                <td>{{$items->c5}}</td>
                <td>{{$items->c6}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <strong>Vektor S &amp; Vektor V</strong>
    <div class="panel-body oxa">
        <table>
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
            @foreach($vektor as $itemsss)
                <?php $e++ ?>
                <tr>
                    <td>{{$e}}</td>
                    <td>{{$itemsss['alternatif']}}</td>
                    <td>{{$itemsss['vektors']}}</td>
                    <td>{{$itemsss['vektorv']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <strong>Perangkingan</strong>
        <table>
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
    </div>
</div>
</body>
</html>
