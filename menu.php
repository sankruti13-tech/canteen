<?php include 'db.php'; ?>

<?php
$result = mysqli_query($conn, "SELECT * FROM food_items");

while($row = mysqli_fetch_assoc($result)){
?>
    <h3><?php echo $row['FName']; ?></h3>
    <p>₹<?php echo $row['FPrice']; ?></p>

    <form action="cart.php" method="post">
        <input type="hidden" name="food_id" value="<?php echo $row['FId']; ?>">
        <input type="number" name="qty" value="1">
        <button>Add to Cart</button>
    </form>
<?php } ?>
