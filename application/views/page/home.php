<style>
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }

    .card-counter.warning {
        background-color: orange;
        color: #FFF;
    }

    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        /* top: 20px; */
        /* font-size: 32px; */
        top: 0px;
        font-size: 60px;
        display: block;
        font-weight: bolder;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        /* top: 65px; */
        top: 80px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }

    /* tabel dibawah */
    .btn-edit2 {
        border: 2px solid black;
        border-color: #077AC7;
    }

    .btn-edit {
        border: 2px solid black;
        background-color: white;
        padding: 4px 20px;
        cursor: pointer;
        border-color: #2C324F;
        color: #2C324F;
        border-radius: 90px;
    }

    .btn-edit:hover {
        background-color: #2C324F;
        border-color: white;
        color: white;
        /* color: green; */
    }

    .btn-delete {
        border-radius: 90px;
    }

    .btnku {
        background-color: #2C324F;
        border: 2px solid;
        /* border-color: #077AC7; */
        /* border: 1px; */
        padding: 8px 20px;
        cursor: pointer;
        color: white;
        border-radius: 90px;
    }

    .btnku:hover {
        background-color: white;
        /* border: 2px solid black; */
        border: 2px solid;
        border-color: #2C324F;
        color: #2C324F;
        /* color: green; */
    }

    .ayam {
        border-radius: 4px;
    }
</style>

<?php
//  $tanggal = date('l, d-m-Y  h:i:s a');
function getHari($date)
{

    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    $day = $datetime->format('l');

    switch ($day) {
        case 'Sunday':
            $hari = 'Minggu';
            break;
        case 'Monday':
            $hari = 'Senin';
            break;
        case 'Tuesday':
            $hari = 'Selasa';
            break;
        case 'Wednesday':
            $hari = 'Rabu';
            break;
        case 'Thursday':
            $hari = 'Kamis';
            break;
        case 'Friday':
            $hari = 'Jum\'at';
            break;
        case 'Saturday':
            $hari = 'Sabtu';
            break;
        default:
            $hari = 'Tidak ada';
            break;
    }
    return $hari;
}
$tanggalku = date('Y-m-d');
// $date = null ;
// echo getHari($date);
$hariku = getHari($tanggalku);

$tanggal = date(' d-m-Y');
$jam = date('H:i');

?>


<!-- <h2>Jam <?= $jam ?></h2> -->
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        var jam = waktu.getHours();
        var menit = waktu.getMinutes();
        var detik = waktu.getSeconds();

        if (detik == 0) {
            detik = "00";
        } else if (detik == 1) {
            detik = "01";
        } else if (detik == 2) {
            detik = "02";
        } else if (detik == 3) {
            detik = "03";
        } else if (detik == 4) {
            detik = "04";
        } else if (detik == 5) {
            detik = "05";
        } else if (detik == 6) {
            detik = "06";
        } else if (detik == 7) {
            detik = "07";
        } else if (detik == 8) {
            detik = "08";
        } else if (detik == 9) {
            detik = "09";
        }

        if (menit == 0) {
            menit = "00";
        } else if (menit == 1) {
            menit = "01";
        } else if (menit == 2) {
            menit = "02";
        } else if (menit == 3) {
            menit = "03";
        } else if (menit == 4) {
            menit = "04";
        } else if (menit == 5) {
            menit = "05";
        } else if (menit == 6) {
            menit = "06";
        } else if (menit == 7) {
            menit = "07";
        } else if (menit == 8) {
            menit = "08";
        } else if (menit == 9) {
            menit = "09";
        }

        if (jam == 0) {
            jam = "00";
        } else if (jam == 1) {
            jam = "01";
        } else if (jam == 2) {
            jam = "02";
        } else if (jam == 3) {
            jam = "03";
        } else if (jam == 4) {
            jam = "04";
        } else if (jam == 5) {
            jam = "05";
        } else if (jam == 6) {
            jam = "06";
        } else if (jam == 7) {
            jam = "07";
        } else if (jam == 8) {
            jam = "08";
        } else if (jam == 9) {
            jam = "09";
        }
        // ==============LAPTOP=====================
        // ==============LAPTOP=====================
        // ==============LAPTOP=====================
        document.getElementById("jam").innerHTML = jam;
        document.getElementById("menit").innerHTML = menit;
        document.getElementById("detik").innerHTML = detik;

        // ==============HP=====================
        // ==============HP=====================
        // ==============HP=====================
        document.getElementById("jamhp").innerHTML = jam;
        document.getElementById("menithp").innerHTML = menit;
        document.getElementById("detikhp").innerHTML = detik;
        // document.getElementById("jam").innerHTML = jam;
        // document.getElementById("jam").innerHTML = waktu.getHours();
        // document.getElementById("menit").innerHTML = waktu.getMinutes();
        // document.getElementById("detik").innerHTML = waktu.getSeconds();

        // let text = document.getElementById("detik").innerHTML;
        // document.getElementById("detik").innerHTML =
        //     text.replace("1", "01");

    }
</script>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> -->
    <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <!-- <div class="card-header" style="background-color:#2C324F;border:2px solid aqua;"> -->
        <!-- <div class="card-header" style="background-color:#2C324F;border:2px solid chartreuse;border-radius:20px ;"> -->

        <!-- =============================== UNTUK LAPTOP =============================== -->
        <!-- =============================== UNTUK LAPTOP =============================== -->
        <!-- =============================== UNTUK LAPTOP =============================== -->
        <div class="card-header shadow-sm pl-4 d-none d-lg-block" style="background-color:#2C324F;border-radius:5px ;">
            <!-- <div class=" btn-toolbar mb-2 mb-md-0"> -->
            <div style="width: 530px">
                <div style="color:chartreuse ;">
                    <!-- <h2><?= $hariku . $tanggal ?></h2> -->
                    <h2 class=" list-inline-item"><?= $hariku . $tanggal ?> Jam </h2>
                    <h2 id="jam" class=" list-inline-item"></h2>
                    <h2 class=" list-inline-item">:</h2>
                    <h2 id="menit" class=" list-inline-item"></h2>
                    <h2 class=" list-inline-item">:</h2>
                    <h2 id="detik" class=" list-inline-item"></h2>
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
                </div>
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button> -->
            </div>
        </div>

        <!-- =============================== UNTUK HP =============================== -->
        <!-- =============================== UNTUK HP =============================== -->
        <!-- =============================== UNTUK HP =============================== -->
        <div class="card-header shadow-sm pl-4 d-md-block d-lg-none" style="background-color:#2C324F;border-radius:5px ;">
            <!-- <div class=" btn-toolbar mb-2 mb-md-0"> -->
            <div>
                <div style="color:chartreuse ;">
                    <!-- <h2><?= $hariku . $tanggal ?></h2> -->
                    <div class="col">
                        <h2 class=" list-inline-item"><?= $hariku . $tanggal ?></h2>
                    </div>
                    <div class="col">
                        <h2 class=" list-inline-item"> Jam </h2>
                        <h2 id="jamhp" class=" list-inline-item"></h2>
                        <h2 class=" list-inline-item">:</h2>
                        <h2 id="menithp" class=" list-inline-item"></h2>
                        <h2 class=" list-inline-item">:</h2>
                        <h2 id="detikhp" class=" list-inline-item"></h2>
                    </div>
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
                </div>
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button> -->
            </div>
        </div>
    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
    <!-- <h2>Section title</h2> -->
    <div class=" ayam">
        <div class="row mb-3">
            <div class="col-sm-6 col-md-3 col-lg">
                <div class="card-counter danger">
                    <!-- <i class="fa fa-code-fork"></i> -->
                    <i class="fa fa-hdd-o"></i>
                    <span class="count-numbers"><?= $barang ?></span>
                    <h2 class="count-name">Barang</h2>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg">
                <div class="card-counter primary">
                    <!-- <i class="fa fa-ticket"></i> -->
                    <i class="fa fa-users"></i>
                    <span class="count-numbers"><?= $customer ?></span>
                    <h2 class="count-name">Customer</h2>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg">
                <div class="card-counter success">
                    <!-- <i class="fa fa-database"></i> -->
                    <i class="fa fa-server"></i>
                    <span class="count-numbers"><?= $supplier ?></span>
                    <h2 class="count-name">Supplier</h2>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg">
                <div class="card-counter info">
                    <i class="fa fa-user-md"></i>
                    <span class="count-numbers"><?= $users ?></span>
                    <h2 class="count-name">Users</h2>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg">
                <div class="card-counter warning">
                    <i class="fa fa-user-md"></i>
                    <span class="count-numbers"><?= $transaksi ?></span>
                    <h2 class="count-name">Transaksi</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-3 ayam">
        <!-- ===================LAPTOP ================= -->
        <!-- ===================LAPTOP ================= -->
        <!-- ===================LAPTOP ================= -->
        <div class="d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <h2 class="list-inline-item">Aktifitas</h2>
                <!-- <h2 class=" list-inline-item float-end">Aktifitas</h2> -->
                <!-- <a style=" font-size:12px" class="btn btn-outline-success fw-bold float-end align-items-end border-2" href="<?= $base ?>dashboard/delete/Supplier">Hapus Data Supplier</a>
            <a style="margin-right:4px; font-size:12px" class="btn btn-outline-primary fw-bold float-end align-items-end border-2" href="dashboard/delete/Customer">Hapus Data Customer</a>
            <a style="margin-right:4px; font-size:12px" class="btn btn-outline-danger fw-bold float-end align-items-end border-2" href="dashboard/delete/Barang">Hapus Data Barang</a> -->


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
                <div class="<?= $cek ?>">
                    <a style="font-size:12px" class="btn btn-outline-success fw-bold align-items-end border-2" href="<?= $base ?>dashboard/delete/Supplier">Hapus Data Supplier</a>
                    <a style="font-size:12px" class="btn btn-outline-primary fw-bold align-items-end border-2" href="dashboard/delete/Customer">Hapus Data Customer</a>
                    <a style="font-size:12px" class="btn btn-outline-danger fw-bold align-items-end border-2" href="dashboard/delete/Barang">Hapus Data Barang</a>
                    <a style="font-size:12px" class="btn btn-outline-warning fw-bold align-items-end border-2" href="dashboard/delete/Transaksi">Hapus Data Transaksi</a>
                </div>
            </div>
        </div>

        <!-- ======================HP================== -->
        <!-- ======================HP================== -->
        <!-- ======================HP================== -->
        <div class="d-md-block d-lg-none">
            <h2 class="list-inline-item">Aktifitas Kamu</h2>
            <div class="">
                <a style="font-size:12px" class="btn btn-outline-success fw-bold align-items-end border-2" href="<?= $base ?>dashboard/delete/Supplier">Hapus Data Supplier</a>
                <a style="font-size:12px" class="btn btn-outline-primary fw-bold align-items-end border-2" href="dashboard/delete/Customer">Hapus Data Customer</a>
                <a style="font-size:12px" class="btn btn-outline-danger fw-bold align-items-end border-2" href="dashboard/delete/Barang">Hapus Data Barang</a>
                <a style="font-size:12px" class="btn btn-outline-warning fw-bold align-items-end border-2" href="dashboard/delete/Transaksi">Hapus Data Transaksi</a>
            </div>
        </div>
        <?php if ($riwayat) : ?>
            <table class="table table-striped table-sm">
                <thead class="text-white" style="background-color:#2C324F;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Data</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Waktu</th>
                        <th class="text-center" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $bu = 0;
                    $co = "";
                    foreach ($riwayat as $vdata) :
                        // if ($bu == 1) {
                        //     $bu -= 1;
                        //     $co = "background-color: #F3F3F3;";
                        // } else {
                        //     $bu += 1;
                        //     $co = "background-color: white;";
                        // }
                        if ($vdata->status == 0) :
                            $status = 'Dihapus';
                            $warna = 'bg-danger';
                        elseif ($vdata->status == 1) :
                            $status = 'Diperbaharui';
                            $warna = 'bg-success';
                        else :
                            $status = 'Data Baru';
                            $warna = 'bg-primary';
                        endif;

                        if ($vdata->nama == 'in') :
                            $nama = 'Transaksi Masuk';
                        elseif ($vdata->nama == 'out') :
                            $nama = 'Transaksi Keluar';
                        else :
                            $nama = $vdata->nama;
                        endif
                    ?>
                        <tr>
                            <td class="pt-2 fw-bold"><?= $no++ ?></td>
                            <td class="pt-2"><?= $vdata->data ?></td>
                            <!-- <td class="pt-2"><?= $vdata->nama  ?></td> -->
                            <td class="pt-2"><?= $nama ?></td>
                            <td class="pt-2"><?= $vdata->kode ?></td>
                            <td class="pt-2"><?= substr($vdata->waktu, 0, -3); ?></td>
                            <!-- <td class="pt-2 fw-bold <?= $warna ?> text-center"><a><?= $status ?></a></td> -->
                            <td class="pt-2 text-white text-center"><a class="card text-decoration-none text-white <?= $warna ?>"><?= $status ?></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="container text-center card bg-opacity-10 bg-primary">
                <h1 style="padding: 10px;" class="text-uppercase">Sedang Menunggu Kamu..</h1>
            </div>
        <?php endif ?>
    </div>
</main>