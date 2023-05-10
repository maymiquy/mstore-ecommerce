<?php 
require_once '../dbkoneksi.php';
$_id = $_GET['id'];
$query = "DELETE FROM product_type WHERE id = ?";
$st = $dbh->prepare($query);
$st->execute([$_id]);
header('location:list_type.php');
?>