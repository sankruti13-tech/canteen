<?php
$conn = mysqli_connect("localhost", "root", "", "canteen_db");
$res = mysqli_query($conn, "DESCRIBE orders");
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['Field'] . " - " . $row['Type'] . "\n";
}
?>