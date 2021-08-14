
<!doctype html>
<html>
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
    <h1>Kriteria</h1>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kriteria</th>
            <th>Atribut</th>
        </tr>
        </thead>
        <?php $i = 0 ?>
        @foreach($kriteria as $item)
            <?php $i++ ?>
        <tr>
            <td>{{$i}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->kriteria}}</td>
            <td>{{$item->atribut}}</td>
        </tr>
            @endforeach
    </table>
</div>
</body>
</html>
