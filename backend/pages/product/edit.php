<?php
include_once '../../templates/header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `product` WHERE `id` = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

function editProduct($data)
{
    global $pdo;
    $sql = "UPDATE `product` SET `sku` = :sku, `name` = :name, `purchase_price` = :purchase_price, `sell_price` = :sell_price, `stock` = :stock, `min_stock` = :min_stock WHERE `product`.`id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':sku', $data['sku']);
    $stmt->bindValue(':name', $data['name']);
    $stmt->bindValue(':purchase_price', $data['purchase_price']);
    $stmt->bindValue(':sell_price', $data['sell_price']);
    $stmt->bindValue(':stock', $data['stock']);
    $stmt->bindValue(':min_stock', $data['min_stock']);
    $stmt->bindValue(':id', $data['id']);
    $stmt->execute();
}

if (isset($_POST['edit'])) {

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $purchase_price = $_POST['purchase_price'];
    $sell_price = $_POST['sell_price'];
    $stock = $_POST['stock'];
    $min_stock = $_POST['min_stock'];
    $id = $_POST['id'];

    $data = [
        'sku' => $sku,
        'name' => $name,
        'purchase_price' => $purchase_price,
        'sell_price' => $sell_price,
        'stock' => $stock,
        'min_stock' => $min_stock,
        'id' => $id
    ];

    editProduct($data);

    header("Location: list.php");
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
            <div class="row-cols-md-2">
                <div class="container mb-5">
                    <div class="card">
                        <div class="container-fluid px-5 py-2">
                            <h2 class="py-4 text-center">Edit Product</h2>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                <div class="mb-3">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" class="form-control" id="sku" name="sku" value="<?= $product['sku']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Product</label>
                                    <input type="text" class="form-control" id="nama" name="name" value="<?= $product['name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="purchase_price" class="form-label">Purchase Price</label>
                                    <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="<?= $product['purchase_price']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sell_price" class="form-label">Sell Price</label>
                                    <input type="number" class="form-control" id="sell_price" name="sell_price" value="<?= $product['sell_price']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="<?= $product['stock']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="min_stock" class="form-label">Min Stock</label>
                                    <input type="number" class="form-control" id="min_stock" name="min_stock" value="<?= $product['min_stock']; ?>" required>
                                </div>

                                <div class="modal-footer my-4">
                                    <a href="list.php" type="button" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../../templates/footer.php'; ?>