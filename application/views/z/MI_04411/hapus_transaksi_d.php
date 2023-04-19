<?php
// koneksi database
include './config/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$header_id = $_GET['header_id'];


// menghapus data dari database
mysqli_query($conn, "DELETE from transaksi_d where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:?mi=edit_transaksi&id=$header_id&detail_id=0");
