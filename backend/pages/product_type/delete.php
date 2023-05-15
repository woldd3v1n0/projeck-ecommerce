<?php

include_once "../../../database/db.php";

function deleteProductType($id)
{
    global $pdo;
    $sql = "DELETE FROM `product_type` WHERE `product_type`.`id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteProductType($id);
    header("Location: list.php");
}
