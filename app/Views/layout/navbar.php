<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="img/logo3.png" width="100" height="80" class="position-absolute" style="margin-top: -2.7rem" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'home') ? 'active' : ''; ?>" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'order') ? 'active' : ''; ?>" href="/Order">Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($active == 'history') ? 'active' : ''; ?>" href="/History">Sejarah Transaksi</a>
                </li>
                <li class="nav-item none-in-md">
                    <span class="nav-link mr-3 ml-3">|</span>
                </li>
                <li class="nav-item mr-2 d-inline">
                    <button class="nav-link text-white btn-logout btn btn-danger px-2 py-2" id="<?= base_url(); ?>/Logout">
                        Logout
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- /navbar -->