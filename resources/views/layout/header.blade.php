<nav class="navbar navbar-default navbar-static-top" style="background-color: #F40009; border-color: #1E1E1E">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?">SPK-WP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('tr_alternatif') }}"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
                <li><a href="{{ route('tr_kriteria') }}"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
                <li><a href="{{ route('nilaialternatif') }}"><span class="glyphicon glyphicon-star"></span> Nilai Alternatif</a></li>
                <li><a href="{{ route('perhitungan') }}"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
                <li><a href="{{ route('ubahpassword') }}"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
                <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
{{--                <li><a href="https://shopee.co.id/" target="_blank"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</a></li>--}}
            </ul>
        </div>
    </div>
</nav>
