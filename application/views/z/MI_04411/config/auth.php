
<?php
$level = $_SESSION['level'];
if ($level != 1) {

    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Anda tidak memiliki akses untuk halaman ini <br>";
    return;
}
?>
