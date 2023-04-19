<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
    echo "hai";
    echo "<br>";
    echo "Operator Relasi";


    echo "<br>";
    $a = 20;
    $b = 5;
    $c = $a > $b; //lebih besar dari
    echo "$a > $b ";
    echo "<br>";
    if ($a > $b) {
        echo "Benar";
    } else {
        echo "Salah";
    }




    echo "<hr>";

    echo "<br>";
    $c = $a < $b; //lebih kecil dari
    if ($a < $b) {
        echo "Benar";
    } else {
        echo "Salah";
    }
    echo "<br>";
    echo "$a < $b: $c";
    echo "<hr>";

    $c = $a == $b; //sama dengan dari
    if ($a == $b) {
        echo "Benar";
    } else {
        echo "Salah";
    }
    echo "<br>";
    echo "$a == $b: $c";
    echo "<hr>";

    $c = $a != $b; //tidak sama dengan dari
    echo "$a != $b: $c";
    echo "<hr>";
    if ($a != $b) {
        echo "Benar";
    } else {
        echo "Salah";
    }
    $c = $a >= $b; //lebih besar sama dengan dari
    echo "$a >= $b: $c";
    echo "<hr>";
    if ($a >= $b) {
        echo "Benar";
    } else {
        echo "Salah";
    }
    $c = $a <= $b; //lebih kecil sama dengan dari
    echo "$a <= $b: $c";
    if ($a <= $b) {
        echo "Benar";
    } else {
        echo "Salah";
    }
    echo "<hr>";
    echo "<br>";


    $nama = "rois";

    if ($nama == 'erwin') {
        echo "yak benar " . $nama;
    } elseif ($nama == 'rois') {
        echo "yak benar " . $nama;
    } else {
        echo "tidak benar namanya " . $nama;
    }

    echo "<hr>";
    echo "<br>";

    $mobil = "Ferari";
    switch ($mobil) {
        case "Honda":
            echo "Mobil ini  " . $mobil;
            break;
        case "Toyota":
            echo "Mobil ini  " . $mobil;
            break;
        default:
            echo "Ini bukan " . $mobil;
    }
    ///////////////////////////////////////////

    echo "<br>";
    echo "<hr>";

    echo "Perulangan Foreach";
    echo "<br>";
    $data_mobil = array("jazz", "freed", "hrv", "crv", "city");
    foreach ($data_mobil as $mobils) {
        echo "$mobils <br>";
    }
    echo "<br>";
    echo "<hr>";

    echo "Perulangan For";
    echo "<br>";
    // menampilkan isi array dengan perulangan for
    for ($i = 0; $i < count($data_mobil); $i++) {
        echo $data_mobil[$i] . "<br>";
    }
    echo "<br>";
    echo "<hr>";

    echo "Perulangan While";
    echo "<br>";
    while ($row = each($data_mobil)) {
        echo $row['value'] . '<br>';
    }

    $data_showroom = array("Honda" => "jazz", "Toyota" => "yaris", "Suzuki" => "Ertiga");
    foreach ($data_showroom as $v => $nama_mobil) {
        echo "$v=$nama_mobil <br>";
    }



    ?>
    <br>
    <br>
    <br>
    <label>GET </label>
    <form method="GET" action="">
        <input type="text" name="nama" placeholder="Nama"><br>
        <input type="text" name="email" placeholder="E-mail"><br>
        <input type="submit" name="submit" value="Save">
    </form>

    <?php

    if ($_GET) {
        echo 'Nama: ' . $_GET['nama'];
        echo '<br>';
        echo 'Email: ' . $_GET['email'];
    }
    ?>

    <br>
    <br>
    <label> POST</label>
    <form method="POST" action="">
        <input type="text" name="nama" placeholder="Nama"><br>
        <input type="text" name="email" placeholder="E-mail"><br>
        <input type="submit" name="submit" value="Simpan">
    </form>

    <br>
    <br>
    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];

        echo 'Nama: ' .  $nama;
        echo '<br>';
        echo 'Email: ' . $email;
    }
    ?>

    <br>
    <br>
    <label> POST Calc</label>
    <form method="POST" action="">
        <input type="number" name="ak1"><br>
        <input type="number" name="ak2"><br>
        <input type="submit" name="submit_calc" value="Simpan">
    </form>

    <br>
    <br>
    <?php
    if (isset($_POST['submit_calc'])) {
        $ak1 = $_POST['ak1'];
        $ak2 = $_POST['ak2'];
        echo  $ak1 + $ak2;
    }
    ?>

</main>