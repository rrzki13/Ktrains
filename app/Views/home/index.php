<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- front background -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/bg6.jpg" class="d-block w-100" height="447" />
        </div>
        <div class="carousel-item">
            <img src="img/bg7.jpg" class="d-block w-100" height="447" />
        </div>
        <div class="carousel-item">
            <img src="img/back.jpg" class="d-block w-100" height="447" />
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<!-- /front background -->

<!-- main -->

<div class="container">
    <form action="">
        <div class="row">
            <div class="col-md-12 bg-white shadow px-5 py-3 rounded mb-5" id="card-main">
                <div class="row">
                    <span class="text-mute" style="font-size: 23px">Hai kamu</span>
                    <h3>Mau Kemana ?</h3>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="dari" class="form-label">Dari</label>
                                        <input type="text" id="dari" class="form-control" autocomplete="off" />
                                        <small class="text-muted" id="dariHelper">Masukan kode stasiun</small>
                                        <small class="text-danger" id="dariValidate"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ke" class="form-label">Ke</label>
                                        <input type="text" id="ke" class="form-control" autocomplete="off" />
                                        <small class="text-muted" id="keHelper">Masukan kode stasiun</small>
                                        <small class="text-danger" id="keValidate"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="berangkat" class="form-label">Berangkat</label>
                                        <input type="date" id="berangkat" class="form-control" />
                                        <small class="text-danger" id="berangkatValidate"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch form-label mb-2">
                                            <input class="form-check-input" type="checkbox" id="check-pulang" />
                                            <label class="form-check-label" for="check-pulang">Pulang</label>
                                        </div>
                                        <input type="date" id="pulang" class="form-control disabled" disabled />
                                        <small class="text-danger" id="pulangValidate"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="jmlTiket" class="form-label">Jumlah Tiket</label>
                                        <input type="text" id="jmlTiket" class="form-control" readonly value="1 dewasa" />
                                        <small class="text-danger" id="dewasaValidate"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <hr />
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-md-3">
                        <input type="hidden" id="dewasaIpt" value="1" />
                        <input type="hidden" id="anakIpt" value="0" />
                        <button class="btn btn-primary w-100" id="cariTiket" type="submit" disabled>
                            Cari Tiket
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row my-2">
        <hr />
    </div>
</div>

<!-- /main -->

<!-- stasiun -->
<div class="container" id="dariStasiunChoose">
    <div class="row">
        <div class="col-md-4 shadow rounded p-3" id="pilihStasiun1">
            <h4>Pilih stasiun</h4>
            <ul class="list-group" id="listFirstStation">
                <?php foreach ($stasiun as $key) : ?>
                    <li class="list-group-item list-group-item1" id="<?= $key['code']; ?>">
                        <?= $key['station_name']; ?> (<?= $key['code']; ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="container" id="keStasiunChoose">
    <div class="row">
        <div class="col-md-4 shadow rounded p-3" id="pilihStasiun2">
            <h4>Pilih stasiun</h4>
            <ul class="list-group" id="listFirstStation">
                <?php foreach ($stasiun as $key) : ?>
                    <li class="list-group-item list-group-item2" id="<?= $key['code']; ?>">
                        <?= $key['station_name']; ?> (<?= $key['code']; ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- /stasiun -->

<!-- jml tiket  -->
<div class="container" id="jmlTiketCard">
    <div class="row justify-content-end">
        <div class="col-md-4 shadow rounded p-3" style="
            z-index: 10;
            margin-top: -9rem;
            border-color: 1px solid #999;
            background-color: #fff;
          ">
            <h4>Jumlah Tiket</h4>
            <div class="row mt-3">
                <div class="col-5">Dewasa</div>
                <div class="col-2">
                    <button class="btn btn-danger w-100 biggerFont" id="minusBtnAdult">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <div class="col-3 text-center biggerFont" id="jmlDewasa">1</div>
                <div class="col-2">
                    <button class="btn btn-success w-100 biggerFont">
                        <i class="fa fa-plus" id="plusBtnAdult"></i>
                    </button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-5">
                    Anak-anak
                    <small class="text-muted">dibawah 10 tahun</small>
                </div>
                <div class="col-2">
                    <button class="btn btn-danger w-100 biggerFont" id="minusBtnInfant">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <div class="col-3 text-center biggerFont" id="jmlBayi">0</div>
                <div class="col-2">
                    <button class="btn btn-success w-100 biggerFont" id="plusBtnInfant">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /jmlTiket -->

<!-- tiket -->
<div class="container mb-5" id="ticketResult">
    <div class="row justify-content-center" id="theLoading">
        <img src="img/search.gif" style="width: 150px; height: 100px" />
    </div>

    <div class="row" id="theTiket">
        <div class="col-12">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="row my-3 justify-content-center" id="tiketGakAda">
                        <div class="col-3 text-center">
                            <img src="img/confused.png" class="w-100">
                        </div>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="col-12 text-center">
                            <h2 id="tiketKet">Tiket Tersedia</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" id="tiketPlace">
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <hr />
    </div>
</div>
<!-- /tiket -->

<!-- favorite train -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>Kereta api favorit</h3>
                </div>
            </div>

            <div class="row justify-content-center mt-3 mb-5">
                <div class="col-10">
                    <div class="row justify-content-center text-center">
                        <?php foreach ($kereta as $key) : ?>
                            <div class="col-md-4">
                                <a href=""><?= $key['train_name']; ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <hr />
    </div>
</div>
<!-- /favorite train -->

<!-- about -->
<div class="container mb-3">
    <div class="row">
        <div class="col-md-6">
            <img src="img/tes4.png" class="w-100" />
        </div>
        <div class="col-md-6 mt-3">
            <h2>Tentang</h2>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
        </div>
    </div>

    <div class="row mt-3">
        <hr />
    </div>
</div>
<!-- /about -->

<!-- cara memesan -->
<div class="container mb-3">
    <div class="row mb-3">
        <div class="col-12 text-center">
            <h2>Cara memesan</h2>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-md-3 mr-3 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        <div class="cardRound text-center">
                            <ion-icon name="search" class="mt-icon primary iconInCardRound"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam
                </div>
            </div>
        </div>
        <div class="col-md-3 mr-3 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        <div class="cardRound text-center">
                            <i class="fa fa-ticket-alt mt-icon primary iconInCardRound"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        <div class="cardRound text-center">
                            <ion-icon name="checkmark-circle-outline" class="mt-icon primary iconInCardRound"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-3">
        <hr />
    </div>
</div>
<!-- /cara memesan -->

<!-- ajukan pertanyaan -->
<div class="container mb-5">
    <div class="row mb-3">
        <div class="col-12">
            <h1>Ajukan Pertanyaan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="row mb-3">
                    <div class="col-12">
                        <input type="email" name="email" id="email" placeholder="Email anda" class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <input type="text" name="No Telepon" id="No Telepon" placeholder="No Telepon anda" class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <textarea name="message" id="message" placeholder="Pesan anda" class="form-control" style="min-height: 200px; resize: none"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-5">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 none-in-md">
            <img src="img/tes3.png" class="user-select-none w-100" />
        </div>
    </div>
</div>
<!-- /ajukan pertanyaan -->

<?= $this->endSection(); ?>