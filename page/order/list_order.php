<?php
require_once '../dbkoneksi.php';

$query = "SELECT `order`.id,`order`.order_number,`order`.`date`,`order`.qty,`order`.total_price,customer.name,product.name,customer.name AS csname, product.name AS pname
    FROM `order`
    INNER JOIN customer ON `order`.customer_id = customer.id
    INNER JOIN product ON `order`.product_id = product.id";
$data = $dbh->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard | M-Store Admin</title>
    <link rel="icon" href="../../assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once '../template-admin/admin_navbar.php'; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="../admin_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="../product/list_product.php">Produk Page</a>
                                <a class="nav-link" href="../product_type/list_type.php">Produk Tipe Page</a>
                                <a class="nav-link" href="../customer/list_customer.php">Customer Page</a>
                                <a class="nav-link active" href="#">Order Page</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Order Page</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                    <a class="btn btn-success mb-4" href="form_order.php" role="button">Tambah Order</a>
                    <div class="card shadow my-5 my-4">
                        <div class="card-header">
                            <i class="fas fa-tags me-1"></i>
                            Order Data
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Order Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['order_number'] ?></td>
                                            <td><?= $row['date'] ?></td>
                                            <td><?= $row['qty'] ?></td>
                                            <td><?= $row['total_price'] ?></td>
                                            <td><?= $row['csname'] ?></td>
                                            <td><?= $row['pname'] ?></td>
                                            <td>
                                                <a href="view_order.php?id=<?= $row['id'] ?>" class="my-1 btn btn-sm btn-primary"> view</a>
                                                <a href="form_order.php?id=<?= $row['id'] ?>" class="my-1 btn btn-sm btn-warning"> Edit</a>
                                                <a href="delete_order.php?id=<?= $row['id'] ?>" class="my-1 btn btn-sm btn-danger" onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $row['name'] ?>?')) {return false}"> Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include_once '../template-admin/admin_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/chart-area-demo.js"></script>
    <script src="../../assets/js/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/datatables-simple-demo.js"></script>
    <script>
        function logout() {
            fetch('../template-admin/admin_navbar.php')
                .then(response => {
                    if (response.ok) {
                        window.location.href = '../../index.php';
                    } else {
                        throw new Error('Logout failed.');
                    }
                })
                .catch(error => alert(error.message));
        }
    </script>
</body>