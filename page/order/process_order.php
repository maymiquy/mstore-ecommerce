<?php 
require_once '../dbkoneksi.php';

$order_number = $_POST['order_number'];
$date = $_POST['date'];
$qty = $_POST['qty'];
$total_price = $_POST['total_price'];
$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];

$process = $_POST['process'];

$ar_data[]=$order_number;
$ar_data[]=$date;
$ar_data[]=$qty;
$ar_data[]=$total_price;
$ar_data[]=$customer_id;
$ar_data[]=$product_id;

if($process == "Tambah"){
    $sql = "INSERT INTO `order` (order_number,date,qty,total_price,customer_id,product_id) VALUES (?,?,?,?,?,?)";
}else if($process == "Update"){
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE `order` SET order_number=?,date=?,qty=?,total_price=?,customer_id=?,product_id=? WHERE id=?";
}

if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:list_order.php');
?>
