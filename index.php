<?php
include_once 'template/header.php';
require_once 'page/dbkoneksi.php';
include_once 'template/navbar.php';
?>

<?php
$query = "SELECT product.id,product.sku,product.name,product.purchase_price,product.sell_price,product.stock,product.min_stock,product.product_type_id,product.restock_id
        FROM product
        INNER JOIN product_type ON product.product_type_id=product_type.id";
$data = $dbh->query($query);
?>

<body>
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="hero w-100" style="height: 595px;" src="assets/img/hero.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">PIS LOV & GWL</h1>
                                    <a href="#produk" class="btn btn-secondary fw-bolder bg-dark py-sm-3 px-sm-4">Check It Out!!!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid top-feature py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-tshirt"></i>
                            </div>
                            <div class="ps-3" style="width: max-content;">
                                <h4 class="text-dark">Clothes</h4>
                                <span>
                                    <ul>
                                        <li>Hoodie</li>
                                        <li>Baju</li>
                                        <li>Celana</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="bi bi-watch"></i>
                            </div>
                            <div class="ps-3" style="width: max-content;"">
                                <h4 class=" text-dark">Accessories</h4>
                                <span>
                                    <ul>
                                        <li>Sepatu</li>
                                        <li>Jam</li>
                                        <li>Topi</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-vest"></i>
                            </div>
                            <div class="ps-3" style="width: max-content;"">
                                <h4 class=" text-dark">Wear</h4>
                                <span>
                                    <ul>
                                        <li>Jaket</li>
                                        <li>Varsity</li>
                                        <li>Vest</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5" id="produk">
        <div class="container mt-2">
            <div class="produk-title text-center mx-auto p-1 wow fadeInUp mb-5 bg-dark">
                <h2 class="text-white m-2">
                    PRODUK
                </h2>
            </div>

            <div class="row mt-2">
                <?php
                $no = 1;
                foreach ($data as $row) {
                ?>
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="template/detail_produk.php?id=<?= $row['id'] ?>" class="image">
                                    <img src="assets/img/hoodie1.jpg" style="width: 200px">
                                </a>
                                <span class="product-discount-label">-23%</span>
                                <ul class="product-links">
                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                                <a href="template/detail_produk.php?id=<?= $row['id'] ?>" class="add-to-cart">Detail Produk</a>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="template/detail_produk.php?id=<?= $row['id'] ?>"><?= $row['name']; ?></a></h3>
                                <div class="price">Rp. <?= $row['purchase_price'] ?><span class="ms-1">Rp. <?= $row['sell_price'] ?></span></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div id="tentang" class="container-fluid mt-5">
                <div class="produk-title text-center mx-auto p-1 wow fadeInUp mt-5 mb-3 bg-dark">
                    <h2 class="text-white m-2">
                        Tentang
                    </h2>
                </div>
                <div class="container rounded-3 bg-dark text-white mt-2 py-5 px-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="lead text-center">Kami adalah toko online yang menjual berbagai macam pakaian berkualitas dengan harga terjangkau. Menawarkan juga produk lain seperti sneakers, topi, dan aksesoris lainnya. Semua produk dari merek ini menunjukkan kualitas yang sangat baik dan perhatian terhadap detail, menjadikannya pilihan yang tepat untuk Anda yang ingin tampil trendi namun tetap elegan.</p>
                            <h3 class="text-center mt-2">Produk Unggulan</h3>
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="assets//img/rolex.jpg" class="rounded-circle" width="80" height="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Rolex</h5>
                                    <span>Accessories</span>
                                    <p>Rolex jam tangan mewah dikenal di seluruh dunia sebagai simbol kekayaan, kemewahan, dan prestise.Berbagai teknologi canggih yang mereka gunakan untuk membuat jam tangan mereka, seperti teknologi water-resistant dan anti-magnetic.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="assets/img/nike.jpg" class="rounded-circle" width="80" height="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Nike Air Jordan</h5>
                                    <span>Wear</span>
                                    <p>Tampilan yang stylish dan inovatif, material yang terus ditingkatkan untuk memaksimalkan kenyamanan dan performa. Dibuat dengan bahan berkualitas tinggi, sepatu ini sangat tahan lama dan dapat digunakan dalam berbagai macam kegiatan.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="assets/img/hoodie1.jpg" class="rounded-circle" width="80" height="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Varsity Black</h5>
                                    <span>Jacket</span>
                                    <p>Jaket ini terbuat dari bahan berkualitas tinggi yang tahan lama dan nyaman dipakai. Desainnya yang ikonik dengan aksen tulisan besar di bagian depan membuat jaket ini cocok untuk dipakai dalam berbagai kesempatan, baik formal maupun informal.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php
    include_once 'template/footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-eHx4nbBTkIr2i0m9SANm/cczPESd0DUEcfl84JpIuutE6oDxPhXvskMR08Wmvmfx5wUpVjlWdi82G5YLvqqJdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/main.js"></script>
    <script>
        function notif() {
            fetch('template/navbar.php')
                .then(response => {
                    if (response.ok) {
                        alert("READ ME BEFORE LOGIN !!!\n\nUsername = admin\nPassword = 123");
                        window.location.href = 'page/login.php';
                    } else {
                        throw new Error('Erro 404');
                    }
                })
                .catch(error => alert(error.message));
        }
    </script>
</body>

</html>