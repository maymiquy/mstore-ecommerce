<?php
require_once '../dbkoneksi.php';

$_id = $_GET['id'];

$query = "SELECT * FROM `product` WHERE id=?";
$st = $dbh->prepare($query);

$st->execute([$_id]);

$row = $st->fetch();
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
                                <a class="nav-link active" href="#">Produk Page</a>
                                <a class="nav-link" href="../product_type/list_type.php">Produk Tipe Page</a>
                                <a class="nav-link" href="../customer/list_customer.php">Customer Page</a>
                                <a class="nav-link" href="../order/list_order.php">Order Page</a>
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
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="mt-4">Produk Page</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Produk</li>
                            </ol>
                        </div>
                        <div class="col-md-2 mt-md-5">
                            <a class="btn btn-danger" href="list_product.php" role="button">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card my-5 shadow">
                        <div class="card-header">
                            <h3 class="text-center">View Produk</h3>
                        </div>
                        <div class="card-body mx-5">
                            <table class="table table-striped" id="datatablesSimple">
                                <tbody>
                                    <tr>
                                        <td>SKU</td>
                                        <td><?= $row['sku'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?= $row['name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Purchase Price</td>
                                        <td><?= $row['purchase_price'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td><?= $row['stock'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Min Stock</td>
                                        <td><?= $row['min_stock'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Produck ID</td>
                                        <td><?= $row['product_type_id'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Restock ID</td>
                                        <td><?= $row['restock_id'] ?></td>
                                    </tr>
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

</html>