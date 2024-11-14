<?php
require_once __DIR__ . '/../DB/Connections.php';
require_once __DIR__ . '/../Model/init.php';

$id = $_GET['id'];
$category = new Category();
$result = $category->delete($id);
if($result){
  echo "<script> alert('Category berhasil dihapus!'); window.location.href = '../views/index-category.php'; </script>";
}
