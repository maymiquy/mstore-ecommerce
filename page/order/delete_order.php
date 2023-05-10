<?php 
require_once '../dbkoneksi.php';
$_id = $_GET['id'];
$query = "DELETE FROM `order` WHERE id = ?";
$st = $dbh->prepare($query);
$st->execute([$_id]);
header('location:list_order.php');
