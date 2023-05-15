<?php include_once 'templates/header.php' ?>
<?php $product = $pdo->query("SELECT * FROM `product` WHERE `id` = " . $_GET["id"])->fetch(PDO::FETCH_ASSOC); ?>

<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Product Details</h2>
            <h3 class="section-subheading text-muted"><?= $product["name"]; ?></h3>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <img class="img-fluid" src="assets/img/portfolio/stationery set.jpg" alt="..." />
            </div>  
            <div class="col-md-4">
                <h4 class="mb-3"><?= $product["name"]; ?></h4>
                <p class="text-muted mb-0">Rp. <?= number_format($product["sell_price"], 0, ",", "."); ?></p>
                <p class="text-muted">Stock : <?= $product["stock"]; ?></p>
                <a href="index.php" class="text-secondary me-2">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
                <a href="checkout.php" class="text-danger">
                    <i class="fas fa-shopping-cart"></i>
                    Checkout</a>
            </div>
        </div>
    </div>
</section>

<?php include_once 'templates/footer.php' ?>