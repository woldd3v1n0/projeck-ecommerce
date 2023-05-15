<?php include_once 'templates/header.php' ?>

<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To Our Store!</div>
        <div class="masthead-heading text-uppercase">def learningtool's</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Let's Shopping</a>
    </div>
</header>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Products</h2>
            <h3 class="section-subheading text-muted">Learning Tools Products</h3>
        </div>
        <div class="row">
            <?php foreach ($products as $p) : ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" href="detail.php?id=<?= $p["id"]; ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/stationery set.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= $p["name"]; ?></div>
                            <div class="portfolio-caption-subheading text-muted">Rp. <?= number_format($p["sell_price"], 0, ",", "."); ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include_once 'templates/footer.php' ?>