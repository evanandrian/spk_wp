<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('img/sidebar-1.jpg')}}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="#" class="simple-text logo-normal">SPK-WP</a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="./dashboard.html">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('tr_alternatif') }}">
                    <i class="material-icons">person</i>
                    <p>Alternatif</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('tr_kriteria') }}">
                    <i class="material-icons">library_books</i>
                    <p>Kriteria</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('nilaialternatif') }}">
                    <i class="material-icons">library_books</i>
                    <p>Nilai Alternatif</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('perhitungan') }}">
                    <i class="material-icons">assignment</i>
                    <p>Perhitungan</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('ubahpassword') }}">
                    <i class="material-icons">lock</i>
                    <p>Ganti Password</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="material-icons">logout</i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>
</div>
