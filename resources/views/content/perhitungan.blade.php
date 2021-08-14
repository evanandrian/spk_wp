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
            <form action="?m=hitung#hasil" method="post">
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
                        <td><input class="form-control input-sm" type="text" name="kriteria[C01]" value="5" /></td>
                        <td><input class="form-control input-sm" type="text" name="kriteria[C02]" value="8" /></td>
                        <td><input class="form-control input-sm" type="text" name="kriteria[C03]" value="8" /></td>
                        <td><input class="form-control input-sm" type="text" name="kriteria[C04]" value="8" /></td>
                        <td><input class="form-control input-sm" type="text" name="kriteria[C05]" value="8" /></td>
                        <td><input class="form-control input-sm" type="text" name="kriteria[C06]" value="8" /></td>
                    </tr>
                </table>
                <button class="btn btn-primary">Hasil Analisa</button>
            </form>
        </div>
    </div>
</div>
