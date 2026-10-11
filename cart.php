<?php
include 'db.php';

$food_id = $_POST['FId'];
$qty = $_POST['FQuantity'];

$result = mysqli_query($conn, "SELECT FPrice FROM food_items WHERE FId=$food_id");
$row = mysqli_fetch_assoc($result);
$price = $row['FPrice'];

$total = $qty * $price;

mysqli_query($conn, "INSERT INTO cart(FId, FQuantity, TAmount)
VALUES($food_id, $qty, $total)");

echo "Added to cart!";
?>
