<?php

include_once "../../../database/db.php";

function deleteOrder($id)
{
    global $pdo;
    $sql = "DELETE FROM `order` WHERE `order`.`id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteOrder($id);
    header("Location: list.php");
}
