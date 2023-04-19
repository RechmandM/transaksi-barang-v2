<?php
if (isset($_GET['mi'])) {
    $page = $_GET['mi'];

    switch ($page) {
        case 'data':
            include "data.php";
            break;
        case 'form':
            include "form.php";
            break;
        case 'form_barang':
            include "form_barang.php";
            break;
        case 'edit_barang':
            include "edit_barang.php";
            break;
        case 'hapus_barang':
            include "hapus_barang.php";
            break;
            /////////////////////////////////////

        case 'cust':
            include "data_cust.php";
            break;
        case 'form_cust':
            include "form_cust.php";
            break;
        case 'edit_cust':
            include "edit_cust.php";
            break;
        case 'hapus_cust':
            include "hapus_cust.php";
            break;


            /////////////////////////////////////
            /////////////////////////////////////

        case 'supp':
            include "data_supp.php";
            break;
        case 'form_supp':
            include "form_supp.php";
            break;
        case 'edit_supp':
            include "edit_supp.php";
            break;
        case 'hapus_supp':
            include "hapus_supp.php";
            break;


            /////////////////////////////////////
            /////////////////////////////////////

        case 'transaksi':
            include "data_transaksi.php";
            break;
        case 'form_transaksi':
            include "form_transaksi.php";
            break;
        case 'edit_transaksi':
            include "edit_transaksi.php";
            break;
        case 'hapus_transaksi':
            include "hapus_transaksi.php";
            break;
        case 'hapus_transaksi_d':
            include "hapus_transaksi_d.php";
            break;


            /////////////////////////////////////
        default:
            include "dashboard.php";
            break;
    }
} else {
    include "dashboard.php";
}
