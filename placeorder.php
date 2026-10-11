<?php
include 'db.php';

$payment = $_POST['payment'];
$date = date("Y-m-d H:i:s");
$first_order_id = null;

if (isset($_POST['cart_data'])) {
    $cart_data = json_decode($_POST['cart_data'], true);
    foreach($cart_data as $item) {
        $fid = (int)$item['id'];
        $fname = mysqli_real_escape_string($conn, $item['name']);
        $fqty = (int)$item['qty'];
        $price = (float)$item['price'];
        $tamount = $fqty * $price;
        
        mysqli_query($conn, "INSERT INTO orders(FId, FName, FQuantity, TAmount, Payment, order_date)
        VALUES('$fid', '$fname', '$fqty', '$tamount', '$payment', '$date')");
        
        if (!$first_order_id) {
            $first_order_id = mysqli_insert_id($conn);
        }
    }
}

// Presentation Variables (From the combined hidden values)
$name = $_POST['items'];
$qty = $_POST['quantity'];
$total = $_POST['total'];

// Clean token generation without date/time
$token = "AU-" . str_pad($first_order_id, 4, "0", STR_PAD_LEFT) . "-Q" . $qty;

echo "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { background: #f4f4f4; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .receipt-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); width: 100%; max-width: 450px; text-align: center; }
        .success-icon { font-size: 50px; margin-bottom: 10px; }
        .receipt-card h2 { color: #4CAF50; margin: 0 0 20px 0; font-size: 28px; }
        .token-box { background: linear-gradient(135deg, #ff5722, #ffeb3b); color: white; padding: 20px; border-radius: 12px; margin-bottom: 30px; }
        .token-box h3 { margin: 0; font-size: 32px; letter-spacing: 2px; text-shadow: 0 2px 4px rgba(0,0,0,0.2); }
        .token-box p { margin: 5px 0 0 0; font-weight: bold; opacity: 0.9; }
        .details { text-align: left; background: #fafafa; padding: 20px; border-radius: 12px; border: 1px dashed #ddd; }
        .details p { margin: 10px 0; font-size: 16px; color: #555; display: flex; justify-content: space-between; border-bottom: 1px solid #eee; padding-bottom: 8px; }
        .details p:last-child { border-bottom: none; }
        .details strong { color: #222; }
        .back-btn { display: inline-block; margin-top: 30px; padding: 15px 30px; background: #ff5722; color: white; text-decoration: none; font-weight: bold; font-size: 18px; border-radius: 30px; transition: 0.3s; box-shadow: 0 4px 15px rgba(255,87,34,0.3); }
        .back-btn:hover { background: #e64a19; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(255,87,34,0.4); }
    </style>
</head>
<body>
    <div class='receipt-card'>
        <div class='success-icon'>🎉</div>
        <h2>Order Confirmed!</h2>
        
        <div class='token-box'>
            <p>YOUR TOKEN</p>
            <h3>$token</h3>
        </div>

        <div class='details'>
            <p><span>Total Items:</span> <strong>$qty</strong></p>
            <p><span>Order Details:</span> <strong>$name</strong></p>
            <p><span>Payment Method:</span> <strong>$payment</strong></p>
            <p><span>Date & Time:</span> <strong>" . date("d M Y, h:i A", strtotime($date)) . "</strong></p>
            <div style='margin-top: 15px; padding-top: 15px; border-top: 2px dashed #ccc; display: flex; justify-content: space-between; font-size: 20px; color: #ff5722; font-weight: bold;'>
                <span>Total Amount:</span>
                <span>₹$total</span>
            </div>
        </div>

        <div id='countdown-box' style='margin-top: 20px; padding: 15px; background: #fff3e0; border: 1px solid #ffe0b2; border-radius: 10px; color: #e65100; font-weight: bold; font-size: 16px; text-align: center;'>
            ⏳ Order auto-cancels in: <span id='timer'>60:00</span>
        </div>

        <a href='main.php' class='back-btn'>Place Another Order</a>
    </div>

    <script>
        let timeLeft = 3600; // 1 hour limit
        let timerEl = document.getElementById('timer');
        let boxEl = document.getElementById('countdown-box');
        
        let interval = setInterval(function() {
            timeLeft--;
            let m = Math.floor(timeLeft / 60);
            let s = timeLeft % 60;
            timerEl.innerText = (m < 10 ? '0'+m : m) + ':' + (s < 10 ? '0'+s : s);
            
            if (timeLeft <= 0) {
                clearInterval(interval);
                boxEl.style.background = '#ffebee';
                boxEl.style.borderColor = '#ffcdd2';
                boxEl.style.color = '#c62828';
                boxEl.innerHTML = '🚨 <strong>Order Cancelled</strong>: 1-hour pickup time limit exceeded.';
                alert('⏳ Auto-Cancellation Notification: Your order has been automatically cancelled because the 1 hour time limit has exceeded.');
            }
        }, 1000);
    </script>
</body>
</html>
";
?>