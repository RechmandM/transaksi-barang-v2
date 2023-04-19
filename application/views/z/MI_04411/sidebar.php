<?php
$level = $_SESSION['level'];
if ($level == 1) {
    $desc = 'Administrator';
} else {
    $desc = 'Staff Gudang';
}
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">

        <h3><?= $desc; ?></h3>
        <?php if ($level == 1) { ?>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=form">
                        <span data-feather="file"></span>
                        Form
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data">
                        <span data-feather="file"></span>
                        Data Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=cust">
                        <span data-feather="file"></span>
                        Data Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=supp">
                        <span data-feather="file"></span>
                        Data Supplier
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=form_barang">
                        <span data-feather="file"></span>
                        Form Barang
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=transaksi">
                        <span data-feather="file"></span>
                        Transaksi
                    </a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="?mi=data">
                        <span data-feather="file"></span>
                        Data Barang
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="?mi=transaksi">
                        <span data-feather="file"></span>
                        Transaksi
                    </a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>