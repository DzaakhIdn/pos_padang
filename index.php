<?php
require_once __DIR__ . "/pos/DB/Connections.php";
require_once __DIR__ . "/pos/Model/init.php";


// $data_buah = ['name' => 'Pisang', 'harga' => 20, 'color' => 'kuning'];
// $apel = ['name' => 'Apel', 'harga' => 10, 'color' => 'hijau'];
// $mangga = ['name' => 'Mangga', 'harga' => 15, 'color' => 'hijau'];
// $manggis = ['name' => 'Manggis', 'harga' => 6, 'color' => 'ungu'];
// $newToko = ['name_store' => 'Pak Joko Store', 'owner' => 'Pak Joko', 'since' => '2005'];

// $manggaB = new Fruits();
// //var_dump($manggaB->create($mangga));

// $Buahmanggis = new Fruits();
// // $Buahmanggis->create($manggis);
// $TokoBuah = new Stores();
// //$TokoBuah->create($newToko);
// var_dump($TokoBuah->all());

header("Location:/projects/pos/views/index.php");