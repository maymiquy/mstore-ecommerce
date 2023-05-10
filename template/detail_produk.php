<?php
require_once '../page/dbkoneksi.php';

$id_ = $_GET['id'];

$query = "SELECT * FROM product
        WHERE product.id=?";
$stmt = $dbh->prepare($query);
$stmt->execute([$id_]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>M-Cloth Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">

</head>



<body>
    <?php
    include_once '../template/navbar.php';
    ?>

    <div class="container my-4">
        <div class="back">
            <a class="btn btn-dark rounded-5" href="../index.php">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
        <div class="produk-title text-center mx-auto p-1 wow fadeInUp mt-2 mb-5 bg-dark">
            <h2 class="text-white m-2">
                Detail Produk
            </h2>
        </div>
        <div class="row mt-3 py-5 px-3 rounded-5" style="background-color: whitesmoke;">
            <div class="col-md-5">
                <div class="main-img">
                    <img class="img-fluid rounded-3" src="../assets/img/hoodie1.jpg" alt="ProductS">
                    <div class="row my-3 previews">
                        <div class="col-3">
                            <img class="w-100" src="../assets/img/hoodie1.jpg" alt="Sale">
                        </div>
                        <div class="col-3">
                            <img class="w-100" src="../assets/img/hoodie1.jpg" alt="Sale">
                        </div>
                        <div class="col-3">
                            <img class="w-100" src="../assets/img/hoodie1.jpg" alt="Sale">
                        </div>
                        <div class="col-3">
                            <img class="w-100" src="../assets/img/hoodie1.jpg" alt="Sale">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-description px-2">
                    <h2 class="bold my-3">
                        <?= $data['name']; ?>
                    </h2>
                    <div class="price-area my-4">
                        <h4 class="old-price mb-1"><del>Rp. <?= $data['sell_price']; ?></del>
                            <span class="old-price-discount text-danger">(23% off)</span>
                        </h4>
                        <h3 class="new-price text-bold mb-1">Rp. <?= $data['purchase_price']; ?></h3>
                        <p class="text-secondary mb-1">(<?= $data['sku']; ?>)</p>
                    </div>
                    <div class="d-flex my-4 row px-4">
                        <div class="col-4 col-md-3">
                            <a href="#" class="btn btn-dark" onclick="tambah()" style="text-transform: uppercase;width: 110px;height: 40px;">Wishlist</a>
                        </div>
                        <div class="col-4 col-md-3">
                            <button class="btn btn-dark" onclick="berhasil()" style="text-transform: uppercase;width: 110px;height: 40px;">Beli</button>
                        </div>
                        <div class="col-4 col-md-3">
                            <input type="number" class="form-control ms-5" style="height: 40px;width: 65px;" id="cart_quantity" value="1" min="1" max="10" placeholder="0" name="cart_quantity">
                        </div>
                    </div>
                </div>
                <div class="product-details my-4">
                    <h5 class="text-dark bold mb-1">Deskripsi</h5>
                    <p class="description">Desain dengan gaya unik identik dengan gaya streetwear umumnya diproduksi secara terbatas memiliki ciri khas yang membuatnya berbeda dari baju-baju konvensional, seperti desain yang out-of-the-box, warna yang mencolok, dan bahan yang berkualitas. </p>
                </div>
                <div class="product-details my-3">
                    <h5 class="details-title text-dark bold mb-2">Material & Care</h5>
                    <ul>
                        <li>Cotton</li>
                        <li>Fletch</li>
                        <li>Machine-wash</li>
                    </ul>
                </div>
                <div class="product-details my-3">
                    <h5 class="details-title text-color bold mb-2">Ukuran</h5>
                    <ul class="d-flex" style="list-style: none;">
                        <li class="bold">S</li>
                        <li class="ms-4 bold">M</li>
                        <li class="ms-4 bold">L</li>
                        <li class="ms-4 bold">XL</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once '../template/footer.php';
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-eHx4nbBTkIr2i0m9SANm/cczPESd0DUEcfl84JpIuutE6oDxPhXvskMR08Wmvmfx5wUpVjlWdi82G5YLvqqJdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        function berhasil() {
            alert("Selamat Barang Berhasil Dibeli :)");
        }

        function tambah() {
            alert("Barang Berhasil Masuk Whislist :)");
        }
    </script>
    <script>
        function notif() {
            fetch('navbar.php')
                .then(response => {
                    if (response.ok) {
                        alert("READ ME BEFORE LOGIN !!!\n\nUsername = admin\nPassword = 123");
                        window.location.href = '../page/login.php';
                    } else {
                        throw new Error('Erro 404');
                    }
                })
                .catch(error => alert(error.message));
        }
    </script>

</body>