<?php
include_once '../../templates/header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `product_type` WHERE `id` = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$product_type = $stmt->fetch(PDO::FETCH_ASSOC);

function editProductType($data)
{
    global $pdo;
    $sql = "UPDATE `product_type` SET `name` = :name WHERE `product_type`.`id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $data['name']);
    $stmt->bindValue(':id', $data['id']);
    $stmt->execute();
}

if (isset($_POST['edit'])) {

    $name = $_POST['name'];
    $id = $_POST['id'];

    $data = [
        'name' => $name,
        'id' => $id
    ];

    editProductType($data);

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
                <li class="breadcrumb-item active">Edit Product Type</li>
            </ol>
            <div class="row-cols-md-2">
                <div class="container mb-5">
                    <div class="card">
                        <div class="container-fluid px-5 py-2">
                            <h2 class="py-4 text-center">Edit Product Type</h2>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $product_type['id']; ?>">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="nama" name="name" required value="<?= $product_type['name']; ?>">
                                </div>

                                <div class=" modal-footer my-4">
                                    <a href="list.php" type="button" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Product Type</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../../templates/footer.php'; ?>