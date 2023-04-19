<?php
// koneksi database
include './config/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($conn, "DELETE from transaksi_h where id_trans='$id'");

// mengalihkan halaman kembali ke index.php
header("location:?mi=transaksi");
