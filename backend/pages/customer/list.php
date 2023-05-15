<?php include_once '../../templates/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Customer</li>
            </ol>
            <a href="add.php" class="btn btn-info btn-md mb-4">Add Customer</a>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="">
                        <i class="fas fa-table me-1"></i>
                        Data Customer
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Card</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $c) : ?>
                                <tr>
                                    <td><?= $c["name"]; ?></td>
                                    <td><?= $c["gender"]; ?></td>
                                    <td><?= $c["phone"]; ?></td>
                                    <td><?= $c["email"]; ?></td>
                                    <td><?= $c["address"]; ?></td>
                                    <td><?= $c["card"]; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $c['id']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="delete.php?id=<?= $c['id']; ?>" class="btn btn-danger">Delete</a>
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