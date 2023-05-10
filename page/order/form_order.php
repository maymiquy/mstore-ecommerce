<?php
require_once '../dbkoneksi.php';

$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    $query = "SELECT * FROM `order` WHERE id=?";
    $data = $dbh->prepare($query);
    $data->execute([$_id]);
    $row = $data->fetch();
} else {
    $row = [];
}
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
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="mt-4">Order Page</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                    <div class="col-md-2 mt-5">
                        <a class="btn btn-danger" href="list_order.php" role="button">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form class="form-horizontal bg-dark text-white mx-auto my-5 p-4 border shadow-sm rounded-4 w-md-75" method="POST" action="process_order.php">
                    <h1 class="text-center mb-3">Tambah/Edit Order</h1>
                    <div class="container px-3">
                        <div class="form-group row mb-3">
                            <label for="order_number" class="col-4 col-form-label">Order Number</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <input id="order_number" name="order_number" type="text" class="form-control" value="<?php if (isset($row['order_number'])) echo $row['order_number']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="date" class="col-4 col-form-label">Tanggal</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <input id="date" name="date" type="datetime-local" class="form-control" value="<?php if (isset($row['date'])) echo $row['date']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="qty" class="col-4 col-form-label">Quantity</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <input id="qty" name="qty" value="<?php if (isset($row['qty'])) echo $row['qty']; ?>" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="total_price" class="col-4 col-form-label">Total Price</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <input id="total_price" name="total_price" value="<?php if (isset($row['total_price'])) echo $row['total_price']; ?>" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="custname" class="col-4 col-form-label">Customer Name</label>
                            <div class="col-8">
                                <?php
                                $querycs = "SELECT * FROM customer";
                                $rscs = $dbh->query($querycs);
                                ?>
                                <select id="customer_id" name="customer_id" class="form-select">
                                    <?php
                                    foreach ($rscs as $rowcs) {
                                    ?>
                                        <option value="<?= $rowcs['id'] ?>"><?= $rowcs['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="product" class="col-4 col-form-label">Product Name</label>
                            <div class="col-8">
                                <?php
                                $queryp = "SELECT * FROM product";
                                $rsp = $dbh->query($queryp);
                                ?>
                                <select id="product_id" name="product_id" class="form-select">
                                    <?php
                                    foreach ($rsp as $rowp) {
                                    ?>
                                        <option value="<?= $rowp['id'] ?>"><?= $rowp['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <?php
                            $button = (empty($_id)) ? "Tambah" : "Update";
                            ?>
                            <input type="submit" name="process" type="submit" class="btn btn-success" value="<?= $button ?>" />
                            <input type="hidden" name="id" value="<?= $_id ?>" />
                        </div>
                    </div>
                </form>
            </div>
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