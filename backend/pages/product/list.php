<?php include_once '../../templates/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
            <a href="add.php" class="btn btn-info btn-md mb-4">Add Product</a>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="">
                        <i class="fas fa-table me-1"></i>
                        Data Product
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Purchase Price</th>
                                <th>Sell Price</th>
                                <th>Stock</th>
                                <th>Min Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $p) : ?>
                                <tr>
                                    <td><?= $p["sku"]; ?></td>
                                    <td><?= $p["name"]; ?></td>
                                    <td><?= $p["purchase_price"]; ?></td>
                                    <td><?= $p["sell_price"]; ?></td>
                                    <td><?= $p["stock"]; ?></td>
                                    <td><?= $p["min_stock"]; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $p['id']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="delete.php?id=<?= $p['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../../templates/footer.php'; ?>