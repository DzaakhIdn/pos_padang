<?php
require_once __DIR__ . '/../Model/init.php';

$id = $_GET["id"];
$menu = new Item();
$result = $menu->delete($id);
if($result){
  echo "<script> alert('Menu berhasil dihapus!'); window.location.href = '../views/index-menu.php'; </script>";
}
