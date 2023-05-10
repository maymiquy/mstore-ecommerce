<?php
include_once 'template-admin/admin_header.php';
require_once 'dbkoneksi.php';
include_once 'template-admin/admin_navbar.php';
?>

<body>
    <div id="layoutSidenav">
        <?php include_once 'template-admin/admin_sidebar.php' ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body">
                                    <h4 class="card-title">Produk</h4>
                                    <div class="align-items-center">
                                        <div style="height: 60px" class="card-icon d-flex justify-content-center align-items-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-success d-flex justify-content-between align-items-center">
                                    <a class="small text-white stretched-link" href="product/list_product.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    <h4 class="card-title">Produk Tipe</h4>
                                    <div class="align-items-center">
                                        <div style="height: 60px" class="card-icon d-flex justify-content-center align-items-center">
                                            <i class="fa fa-tshirt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-success d-flex justify-content-between align-items-center">
                                    <a class="small text-white stretched-link" href="product_type/list_type.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <h4 class="card-title">Customer</h4>
                                    <div class="align-items-center">
                                        <div style="height: 60px" class="card-icon d-flex justify-content-center align-items-center">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-success d-flex justify-content-between align-items-center">
                                    <a class="small text-white stretched-link" href="customer/list_customer.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <h4 class="card-title">Order</h4>
                                    <div class="align-items-center">
                                        <div style="height: 60px" class="card-icon d-flex justify-content-center align-items-center">
                                            <i class="fa fa-tags"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-success d-flex justify-content-between align-items-center">
                                    <a class="small text-white stretched-link" href="order/list_order.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <?php include_once 'template-admin/admin_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/chart-area-demo.js"></script>
    <script src="../assets/js/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/datatables-simple-demo.js"></script>
    <script>
        function logout() {
            fetch('template-admin/admin_navbar.php')
                .then(response => {
                    if (response.ok) {
                        alert("Yakin ingin keluar?\n Anda akan dialihkan kehalaman utama :)");
                        window.location.href = '../index.php';
                    } else {
                        throw new Error('Logout failed.');
                    }
                })
                .catch(error => alert(error.message));
        }
    </script>
</body>

</html>