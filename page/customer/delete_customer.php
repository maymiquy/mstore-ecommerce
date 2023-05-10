<?php
require_once '../dbkoneksi.php';
$_id = $_GET['id'];
$query = "DELETE FROM customer WHERE id = ?";
$st = $dbh->prepare($query);
$st->execute([$_id]);
header('location:list_customer.php');
