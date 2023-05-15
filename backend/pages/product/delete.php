<?php

include_once "../../../database/db.php";

function deleteProduct($id)
{
    global $pdo;
    $sql = "DELETE FROM `product` WHERE `product`.`id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteProduct($id);
    header("Location: list.php");
}
