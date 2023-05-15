<?php
include_once '../../templates/header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `customer` WHERE `id` = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

function editCustomer($data)
{
    global $pdo;
    $sql = "UPDATE `customer` SET `name` = :name, `gender` = :gender, `phone` = :phone, `email` = :email, `address` = :address WHERE `customer`.`id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $data['name']);
    $stmt->bindValue(':gender', $data['gender']);
    $stmt->bindValue(':phone', $data['phone']);
    $stmt->bindValue(':email', $data['email']);
    $stmt->bindValue(':address', $data['address']);
    $stmt->bindValue(':id', $data['id']);
    $stmt->execute();
}

if (isset($_POST['edit'])) {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $id = $_POST['id'];

    $data = [
        'name' => $name,
        'gender' => $gender,
        'phone' => $phone,
        'email' => $email,
        'address' => $address,
        'id' => $id
    ];

    editCustomer($data);

    header("Location: list.php");
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Customer</li>
                <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
            <div class="row-cols-md-2">
                <div class="container mb-5">
                    <div class="card">
                        <div class="container-fluid px-5 py-2">
                            <h2 class="py-4 text-center">Edit Customer</h2>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $customer['id']; ?>">

                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $customer['name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-select" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $customer['phone']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $customer['email']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?= $customer['address']; ?>" required>
                                </div>

                                <div class="modal-footer my-4">
                                    <a href="list.php" type="button" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Customer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../../templates/footer.php'; ?>