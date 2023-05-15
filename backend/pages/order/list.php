<?php include_once '../../templates/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="">
                        <i class="fas fa-table me-1"></i>
                        Data Order
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order Number</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Total Price</th>
                                <th>Customer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $o) : ?>
                                <tr>
                                    <td><?= $o["id"]; ?></td>
                                    <td><?= $o["order_number"]; ?></td>
                                    <td><?= $o["date"]; ?></td>
                                    <td><?= $o["product"]; ?></td>
                                    <td><?= $o["qty"]; ?></td>
                                    <td>Rp. <?= number_format($o["total_price"], 0, ',', '.'); ?></td>
                                    <td><?= $o["customer"]; ?></td>
                                    <td>
                                        <a href="delete.php?id=<?= $o['id']; ?>" class="btn btn-danger">Delete</a>
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