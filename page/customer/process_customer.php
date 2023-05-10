<?php
require_once '../dbkoneksi.php';

$name = $_POST['name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$card_id = $_POST['card_id'];

$process = $_POST['process'];

$ar_data[] = $name;
$ar_data[] = $gender;
$ar_data[] = $phone;
$ar_data[] = $email;
$ar_data[] = $address;
$ar_data[] = $card_id;

if ($process == "Tambah") {
    $sql = "INSERT INTO customer (name,gender,phone,email,address,card_id) VALUES (?,?,?,?,?,?)";
} else if ($process == "Update") {
    $ar_data[] = $_POST['id'];
    $sql = "UPDATE customer SET name=?,gender=?,phone=?,email=?,address=?,card_id=? WHERE id=?";
}

if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:list_customer.php');
