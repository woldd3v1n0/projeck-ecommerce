<?php include_once 'templates/header.php';

function checkoutProduct($data)
{
    global $pdo;
    $sql = "INSERT INTO `order` (`order_number`,`customer_id`, `product_id`, `qty`, `total_price`,`date`) VALUES (:order_number,:customer_id, :product_id, :qty, :total, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':order_number', $data['order_number']);
    $stmt->bindValue(':customer_id', $data['customer_id']);
    $stmt->bindValue(':product_id', $data['product_id']);
    $stmt->bindValue(':qty', $data['qty']);
    $stmt->bindValue(':total', $data['total']);
    $stmt->execute();
}

if (isset($_POST['checkout'])) {
    $order_number = $_POST['order_number'];
    $customer_id = $_POST['customer'];
    $product_id = $_POST['product'];
    $qty = $_POST['qty'];

    $product = $pdo->query("SELECT * FROM `product` WHERE `id` = " . $product_id)->fetch(PDO::FETCH_ASSOC);
    $total = $product['sell_price'] * $qty;

    $data = [
        'order_number' => $order_number,
        'customer_id' => $customer_id,
        'product_id' => $product_id,
        'qty' => $qty,
        'total' => $total
    ];

    checkoutProduct($data);

    echo "<script>alert('Checkout Success!');window.location.href='index.php';</script>";
}



?>

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center my-5">
            <h2 class="section-heading text-uppercase">Checkout Product</h2>
        </div>
        <form id="contactForm" method="POST">
            <div class="row align-items-stretch mb-5 justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" name="order_number" type="text" placeholder="Order Number" required />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="name" name="customer" required>
                            <option value="">-- Select Customer --</option>
                            <?php foreach ($customers as $customer) : ?>
                                <option value="<?= $customer["id"]; ?>"><?= $customer["name"]; ?> - <?= $customer["card"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="name" name="product" required>
                            <option value="">-- Select Product --</option>
                            <?php foreach ($products as $product) : ?>
                                <option value="<?= $product["id"]; ?>"><?= $product["name"]; ?> - <?= $product["stock"]; ?> left</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" name="qty" type="number" placeholder="Qty" required />
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" name="checkout" type="submit">Checkout</button>
            </div>
        </form>
    </div>
</section>

<?php include_once 'templates/footer.php' ?>