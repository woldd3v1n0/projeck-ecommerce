<?php
include_once '../../templates/header.php';

function addProductType($data)
{
    global $pdo;
    $sql = "INSERT INTO `product_type` (`name`) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $data['name']);
    $stmt->execute();
}

if (isset($_POST['add'])) {

    $name = $_POST['name'];

    $data = [
        'name' => $name
    ];

    addProductType($data);

    header("Location: list.php");
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Product Type</li>
                <li class="breadcrumb-item active">Add Product Type</li>
            </ol>
            <div class="row-cols-md-2">
                <div class="container mb-5">
                    <div class="card">
                        <div class="container-fluid px-5 py-2">
                            <h2 class="py-4 text-center">Add Product Type</h2>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Product Type</label>
                                    <input type="text" class="form-control" id="nama" name="name" required>
                                </div>

                                <div class=" modal-footer my-4">
                                    <a href="list.php" type="button" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-dark ms-2" name="add">Add Product Type</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../../templates/footer.php'; ?>