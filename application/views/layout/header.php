<!-- sm-sm-auto -->
<main class=" sticky-top col-md-9 col-lg-12 ms-auto px-md-0">
    <header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 px-4 py-3 bg-primary" href="#">PT Rechmand Technology</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav-item text-nowrap">
            <!-- <marquee width="100%" height="40">Teks ini berjalan</marquee> -->
            <!-- <h1><marquee scrolldelay="400" direction="up" height="40" width="1020px"> -->
            <!-- <h1><marquee scrolldelay="1" scrollamount="500" height="40" width="1020px"> -->
            <h2 class="py-0" style="color:lime">
                <marquee scrollamount="20" height="auto" width="1000px">
                    Selamat Datang <?= $this->session->userdata('ses_nama') ?></marquee>
            </h2>
        </div>
        text
        <div class="navbar-nav">
            <div class="nav-item text-nowrap py-3" style="background-color: #2C324F;">
                <a style="padding: 11px;" class="nav-link px-3 text-white fw-bold pt-2" href="<?= $base ?>login/logout">Sign out</a>
            </div>
        </div>
    </header>
</main>
<!-- <marquee width="500" height="40">Teks ini berjalan</marquee> -->