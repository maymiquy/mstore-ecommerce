<?php
require_once '../dbkoneksi.php';

$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    $query = "SELECT * FROM product WHERE id=?";
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
                        <div class="col-md-2 mt-5">
                            <a class="btn btn-danger" href="list_product.php" role="button">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <form class="form-horizontal bg-dark text-white my-5 p-4 border shadow-sm rounded-4 w-md-75 mx-auto" method="POST" action="process_product.php">
                        <h1 class="text-center mb-3">Tambah/Edit Product</h1>
                        <div class="container px-3">
                            <div class="form-group row mb-3">
                                <label for="sku" class="col-4 col-form-label">SKU</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <input id="sku" name="sku" type="text" class="form-control" value="<?php if (isset($row['sku'])) echo $row['sku']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <input id="name" name="name" type="text" class="form-control" value="<?php if (isset($row['name'])) echo $row['name']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="purchase_price" class="col-4 col-form-label">Purchase Price</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <input id="purchase_price" name="purchase_price" value="<?php if (isset($row['purchase_price'])) echo $row['purchase_price']; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="stock" class="col-4 col-form-label">Stock</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <input id="stock" name="stock" value="<?php if (isset($row['stock'])) echo $row['stock']; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="min_stock" class="col-4 col-form-label">Minimum Stock</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <input id="min_stock" name="min_stock" value="<?php if (isset($row['min_stock'])) echo $row['min_stock']; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="product" class="col-4 col-form-label">Produk Tipe</label>
                                <div class="col-8">
                                    <?php
                                    $querypt = "SELECT * FROM product_type";
                                    $rspt = $dbh->query($querypt);
                                    ?>
                                    <select id="product_type_id" name="product_type_id" class="form-select">
                                        <?php
                                        foreach ($rspt as $rowpt) {
                                        ?>
                                            <option value="<?= $rowpt['id'] ?>"><?= $rowpt['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="restock" class="col-4 col-form-label">Restock ID</label>
                                <div class="col-8">
                                    <?php
                                    $queryrs = "SELECT * FROM restock";
                                    $rsrs = $dbh->query($queryrs);
                                    ?>
                                    <select id="restock_id" name="restock_id" class="form-select">
                                        <?php
                                        foreach ($rsrs as $rowrs) {
                                        ?>
                                            <option value="<?= $rowrs['id'] ?>"><?= $rowrs['restock_number'] ?></option>
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