
<?php

echo "Hai";
echo "<br>";
echo "localhost/MI_04411";

echo "<br>";

echo "aritmatika";
echo "<br>";
$a = 20;
$b = 2;

// penjumlahan
$c = $a + $b;
echo "$a + $b = $c";
echo "<hr>";

// pengurangan
$c = $a - $b;
echo "$a - $b = $c";
echo "<hr>";

// Perkalian
$c = $a * $b;
echo "$a * $b = $c";
echo "<hr>";

// Pembagian
$c = $a / $b;
echo "$a / $b = $c";
echo "<hr>";

// Pangkat
$c = $a ** $b;
echo "$a ** $b = $c";
echo "<hr>";

echo "<br>";

echo "Operator Relasi";


echo "<br>";

// menggunakan operator relasi lebih besar
$c = $a > $b;
echo "$a > $b: $c";
echo "<hr>";

// menggunakan operator relasi lebih kecil
$c = $a < $b;
echo "$a < $b: $c";
echo "<hr>";

// menggunakan operator relasi lebih sama dengan
$c = $a == $b;
echo "$a == $b: $c";
echo "<hr>";

// menggunakan operator relasi lebih tidak sama dengan
$c = $a != $b;
echo "$a != $b: $c";
echo "<hr>";

// menggunakan operator relasi lebih besar sama dengan
$c = $a >= $b;
echo "$a >= $b: $c";
echo "<hr>";

// menggunakan operator relasi lebih kecil sama dengan
$c = $a <= $b;
echo "$a <= $b: $c";
echo "<hr>";
echo "<br>";
echo "Kondisi ";
$teman = "andi";
if ($teman == "andi") {
    echo "dia adalah teman saya";
} else {
    echo "dia bukan teman saya";
}
echo "<br>";
$mobil = "Honda";

switch ($mobil) {
    case "Honda":
        echo "Mobil " . $teman . " adalah " . $mobil;
        break;
    case "Suzuki":
        echo "Mobil " . $teman . " adalah " . $mobil;
        break;
    case "Toyota":
        echo "Mobil " . $teman . " adalah " . $mobil;
        break;
    default:
        echo "Mobil " . $teman . " bukan Honda, Suzuki, ataupun Toyota!";
}


echo "<br>";
if ($a > $b) {
    echo "Nilai benar";
}

echo "<hr>";
echo "<br>";
echo "Pengulangan Foreach";
echo "<br>";
echo "<br>";
$mobil = array("jazz", "freed", "hrv", "crv");

foreach ($mobil as $nilai) {
    echo "$nilai <br>";
}

$mobil2 = array("Honda"=>"Jazz", "Toyota"=>"freed", "Honda"=>"hrv","Honda"=> "crv");
foreach ($mobil2 as $nilai2=>$val2) {
    echo "$nilai2=$val2 <br>";
}
echo "<hr>";
echo "Pengulangan For";
echo "<br>";

// menampilkan isi array dengan perulangan for
for ($i = 0; $i < count($mobil); $i++) {
    echo $mobil[$i] . "<br>";
}

echo "<hr>";
echo "Pengulangan While";
echo "<br>";
$i = 1;
while ($row = each($mobil)) {
    echo $row['value'] . '<br>';
}

echo "<hr>";
echo "Pengulangan Do While";
echo "<br>";
$x = 1;
do {
    echo "Angka ke $x <br>";
    $x++;
} while ($x <= 6);
?>

