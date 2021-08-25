
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
    <h1>Nilai Bobot Alternatif</h1>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Alternatif</th>
            <th>Nama Atribut</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
        </tr>
        </thead>
        <?php $i = 0 ?>
        @foreach($data as $item)
            <?php $i++ ?>
        <tr>
            <td>{{$i}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->alternatif}}</td>
            <td>{{$item->atribut}}</td>
            <td>{{$item->c1}}</td>
            <td>{{$item->c2}}</td>
            <td>{{$item->c3}}</td>
            <td>{{$item->c4}}</td>
            <td>{{$item->c5}}</td>
            <td>{{$item->c6}}</td>
        </tr>
            @endforeach
    </table>
</div>
</body>
</html>
