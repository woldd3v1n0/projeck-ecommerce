<?php

$host = 'localhost';
$pass = '';
$user = 'root';
$db = 'db_learningtools';

$pdo = new PDO('mysql:=host=' . $host . ';dbname=' . $db, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM `product`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `product_type`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$productTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT customer.*, card.name as card FROM `customer` INNER JOIN card ON customer.card_id = card.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT `order`.*, `product`.name as product, `customer`.name as customer FROM `order` INNER JOIN `product` ON `order`.product_id = `product`.id INNER JOIN `customer` ON `order`.customer_id = `customer`.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
