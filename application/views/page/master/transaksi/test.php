<?php

// foreach ($data as $ayam) {
//     echo $ayam['default']['customer']['nama'] . PHP_EOL;
// }

// $aku = [
//     'def' => [
//         'cus' => [
//             0 => [
//                 'nama' => 'satu'
//             ],
//             1 => [
//                 'nama' => 'dua'
//             ],
//             2 => [
//                 'nama' => 'tiga'
//             ]
//         ]
//     ]
// ];
// $aku = [
//     'def' => [
//         'cus' => [
//             0 => [
//                 'nama' => 'satu'
//             ],

//             1 => [
//                 'nama' => 'dua'
//             ],
//             2 => [
//                 'nama' => 'tiga'
//             ]
//         ]
//     ]
// ];
$aku = [];

$aku['def']['cus'][0]['nama'] = 'satu';
$aku['def']['cus'][1]['nama'] = 'dua';
$aku['def']['cus'][2]['nama'] = 'tiga';

var_dump($aku['def']['cus']);
foreach ($aku['def']['cus'] as $row) {
    echo $row['nama'] . PHP_EOL;
}
