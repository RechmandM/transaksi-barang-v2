<?php

include 'koneksi.php';
session_start();
$result = mysqli_query($conn, "SELECT * from user WHERE username = '$username'  and password = '$password'");
$user_data = mysqli_fetch_array($result);
$no_rows = mysqli_num_rows($result);
// var_dump($no_rows);
// die();
if ($no_rows == 1) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user_data['username'];
    $_SESSION['nama'] = $user_data['nama'];
    $_SESSION['level'] = $user_data['level'];
    $_SESSION['id'] = $user_data['id'];
    return true;
} else {
    return false;
}
