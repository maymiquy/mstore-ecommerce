<?php 
require_once '../dbkoneksi.php';

$name = $_POST['name'];

$process = $_POST['process'];

$ar_data[]=$name;


if($process == "Tambah"){
    $sql = "INSERT INTO product_type (name) VALUES (?)";
}else if($process == "Update"){
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE product_type SET name=? WHERE id=?";
}


if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:list_type.php');
?>
