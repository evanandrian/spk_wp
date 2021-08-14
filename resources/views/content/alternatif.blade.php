<div class="container">
    <div class="page-header">
        <h1>Alternatif</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <form class="form-inline">
                <input type="hidden" name="m" value="alternatif" />
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="" />
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Refresh</button>
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-primary" href="{{ route('tambah_alternatif') }}"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                </div>
                <div class="form-group" style="margin-left: 10px">
                    <button class="btn btn-default" href="#" target="_blank"><span class="glyphicon glyphicon-plus"></span> Cetak</button>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tr>
                <td>1</td>
                <td>A01</td>
                <td>Alternatif 1</td>
                <td></td>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=A01"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=A01" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>A02</td>
                <td>Alternatif 2</td>
                <td></td>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=A02"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=A02" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>A03</td>
                <td>Alternatif 3</td>
                <td></td>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=A03"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=A03" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>A04</td>
                <td>Alternatif 4</td>
                <td></td>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=A04"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=A04" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        </table>
    </div>
</div>
