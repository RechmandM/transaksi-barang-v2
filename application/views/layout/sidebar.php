<!-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:#0b112e ;"> -->
<style>
    .bg-merah {
        border: 0px solid black;
        background-color: red;
        padding: 12px 35px;
        margin: 5px;
        cursor: pointer;
        border-color: #077AC7;
        color: white;
    }

    .bg-hijau {
        border: 0px solid black;
        background-color: green;
        padding: 12px 35px;
        margin: 5px;
        cursor: pointer;
        border-color: #077AC7;
        color: white;
    }

    .aku {
        border: 0px solid black;
        background-color: #077AC7;
        padding: 12px 35px;
        margin: 5px;
        cursor: pointer;
        border-color: #077AC7;
        color: white;
    }

    .aku:hover {
        background-color: #077AC7;
        border-color: blue;
        color: white;
    }

    .aku2 {
        border-color: #077AC7;
        padding: 12px 35px;
        margin: 5px;
    }

    .aku2:hover {
        background-color: #077AC7;
    }

    hr {
        margin: 0px;
    }

    hr.baru {
        border: 1px solid white;
    }
</style>

<audio class=" d-none col-10 ms-auto" id="myAudio" controls>
    <source src="assets/audio/soundtrack.mp3" type="audio/mp3">
    Your browser does not support the audio element.
</audio>
<script>
    var x = document.getElementById("myAudio");

    function play() {
        x.autoplay = true;
        x.load();
    }

    function stop() {
        x.autoplay = false;
        x.load();
    }

    function pause() {
        x.pause();
    }

    function playagain() {
        x.play();
    }

    function playAudio(url) {
        new Audio(url).play();
    }
</script>
<div class="col-10 ms-auto">
    <!-- <button class="btn" src="image.png" onclick="play('assets/audio/soundtrack.mp3')">Play</button> -->
    <button class="btn" src="image.png" onclick="playagain('assets/audio/soundtrack.mp3')">Play</button>
    <button class="btn" src="image.png" onclick="pause('assets/audio/soundtrack.mp3')">Pause</button>
    <button class="btn" src="image.png" onclick="stop('assets/audio/soundtrack.mp3')">Stop</button>
    <!-- <button class="btn" src="image.png" onclick="playAudio('assets/audio/soundtrack.mp3')">Stop</button> -->
</div>
<button hidden onclick="play()">ayam</button>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:#2C324F ;">
    <div class="position-sticky pt-4">
        <ul class="nav flex-column">

            <?php
            if ($this->session->userdata('ses_level') == '1') :
                $warna = 'bg-merah';
                $status = 'ADMINISTRATOR';
                $cek = '';
            else :
                $warna = 'bg-hijau';
                $status = 'MEMBER';
                $cek = 'd-none';
            endif ?>

            <li class="nav-item">
                <p class="nav-link text-white fw-bold text-white <?= $warna ?>" aria-current="page">
                    <span class="active text-white" data-feather="user"></span>
                    <?= $status ?>
                </p>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if ($menu == "dash") { ?>aku text-white fw-bold <?php } else { ?>aku2 text-white <?php } ?>" aria-current="page" href="<?= $base; ?>">
                    <span class="<?php if ($menu == "dash") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="home"></span>
                    Dashboard

                </a>
            </li>
            <hr class="baru">
            <li class="nav-item">
                <a class="nav-link <?php if ($menu == "info") { ?>aku text-white fw-bold <?php } else { ?>aku2 text-white <?php } ?>" href="<?= $base; ?>info">
                    <span class="<?php if ($menu == "info") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="user"></span>
                    My Info
                </a>
            </li>
            <hr class="baru">
            <li class="nav-item <?= $cek ?>">
                <a class="nav-link <?php if ($menu == "barang") { ?>aku text-white fw-bold <?php } else { ?>aku2 text-white <?php } ?>" href="<?= $base; ?>databarang">
                    <span class="<?php if ($menu == "barang") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="hard-drive"></span>
                    Data Barang
                </a>
            </li>
            <hr class="baru">
            <li class="nav-item <?= $cek ?>">
                <a class="nav-link <?php if ($menu == "customer") { ?>aku text-white fw-bold <?php } else { ?>aku2 text-white <?php } ?>" href="<?= $base; ?>datacustomer">
                    <span class="<?php if ($menu == "customer") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="users"></span>
                    Data Customer
                </a>
            </li>
            <hr class="baru  <?= $cek ?>">
            <li class="nav-item <?= $cek ?>">
                <a class="nav-link <?php if ($menu == "supplier") { ?>aku text-white fw-bold<?php } else { ?>aku2 text-white <?php } ?>" href="<?= $base; ?>datasupplier">
                    <span class="<?php if ($menu == "supplier") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="server"></span>
                    Data Supplier
                </a>
            </li>
            <hr class="baru  <?= $cek ?>">
            <li class="nav-item">
                <a class="nav-link <?php if ($menu == "user") { ?>aku text-white fw-bold<?php } else { ?>aku2 text-white <?php } ?>" href="<?= $base; ?>datauser">
                    <span class="<?php if ($menu == "user") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="users"></span>
                    Data Users
                </a>
            </li>
            <hr class="baru  <?= $cek ?>">
            <li class="nav-item">
                <a class="nav-link <?php if ($menu == "transaksi") { ?>aku text-white fw-bold<?php } else { ?>aku2 text-white <?php } ?>" href="<?= $base; ?>datatransaksi">
                    <span class="<?php if ($menu == "transaksi") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="activity"></span>
                    Data Transaksi
                </a>
            </li>
            
            <hr class="baru  <?= $cek ?>">
            <li class="nav-item">
                <a class="nav-link <?php if ($menu == "laporan_transaksi") { ?>aku text-white fw-bold<?php } else { ?>aku2 text-white <?php } ?>" href="<?= $base; ?>datalaporan">
                    <span class="<?php if ($menu == "laporan_transaksi") { ?>active text-white<?php } else { ?> text-white <?php } ?>" data-feather="activity"></span>
                    Laporan Transaksi
                </a>
            </li>
            <hr class="baru">
        </ul>
    </div>
</nav>