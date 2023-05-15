<?php

include_once "../../../database/db.php";

function deleteCustomer($id)
{
    global $pdo;
    $sql = "DELETE FROM `customer` WHERE `customer`.`id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteCustomer($id);
    header("Location: list.php");
}
