<?php 
require_once '../dbkoneksi.php';

$sku = $_POST['sku'];
$name = $_POST['name'];
$purchase_price = $_POST['purchase_price'];
$stock = $_POST['stock'];
$min_stock = $_POST['min_stock'];
$product_type_id = $_POST['product_type_id'];
$restock_id = $_POST['restock_id'];

$process = $_POST['process'];

$ar_data[]=$sku;
$ar_data[]=$name;
$ar_data[]=$purchase_price;
$ar_data[]=1.2 * $purchase_price;
$ar_data[]=$stock;
$ar_data[]=$min_stock;
$ar_data[]=$product_type_id;
$ar_data[]=$restock_id;

if($process == "Tambah"){
    $sql = "INSERT INTO product (sku,name,purchase_price,sell_price,stock,min_stock,product_type_id,restock_id) VALUES (?,?,?,?,?,?,?,?)";
}else if($process == "Update"){
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE product SET sku=?,name=?,purchase_price=?,sell_price=?,stock=?,min_stock=?,product_type_id=?,restock_id=? WHERE id=?";
}

if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:list_product.php');
?>