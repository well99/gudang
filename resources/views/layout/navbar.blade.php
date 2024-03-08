<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            @if(auth()->user()->role == 1)
            <a class="nav-link" href="/user">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                User
            </a>
            @endif
            <a class="nav-link" href="/gudang">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Gudang
            </a>
            <a class="nav-link" href="/jenis">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Jenis
            </a>
            <a class="nav-link" href="/barang">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Barang
            </a>

            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a>
        </div>
    </div>
</nav>