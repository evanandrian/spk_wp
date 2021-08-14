<div class="container">
    <div class="page-header">
        <h1>Nilai Bobot Alternatif</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <form class="form-inline">
                <input type="hidden" name="m" value="rel_alternatif" />
                <div class="form-group" style="margin-left: 10px">
                    <input class="form-control" type="text" name="q" value="" />
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-default" href="cetak.php?m=rel_alternatif" target="_blank"><span class="glyphicon glyphicon-plus"></span> Cetak</button>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th>C1</th><th>C2</th><th>C3</th><th>C4</th><th>C5</th><th>C6</th>        <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>A1</td>
                <td>Alternatif 1</td>
                <td>3500</td><td>70</td><td>10</td><td>80</td><td>3000</td><td>36</td>    <td>
                    <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=A01"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </td>
            </tr>
            <tr>
                <td>A2</td>
                <td>Alternatif 2</td>
                <td>4500</td><td>90</td><td>10</td><td>60</td><td>2500</td><td>48</td>    <td>
                    <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=A02"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </td>
            </tr>
            <tr>
                <td>A3</td>
                <td>Alternatif 3</td>
                <td>4000</td><td>80</td><td>9</td><td>90</td><td>2000</td><td>48</td>    <td>
                    <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=A03"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </td>
            </tr>
            <tr>
                <td>A4</td>
                <td>Alternatif 4</td>
                <td>4000</td><td>70</td><td>8</td><td>50</td><td>1500</td><td>60</td>    <td>
                    <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=A04"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
