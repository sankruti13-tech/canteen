<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modern Canteen</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f4f4;
            overflow-x: hidden;
        }

        .page {
            display: none !important;
        }

        .page.active {
            display: block !important;
        }

        #landing.page.active {
            display: flex !important;
        }

        /* 🔥 UPDATED LANDING PAGE */
        #landing {
            height: 100vh;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
                url("https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=1600&q=80");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        #landing button {
            padding: 16px 40px;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-size: 20px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            border: none;
            border-radius: 40px;
            background: white;
            color: #ff5722;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        #landing button:hover {
            background: #ff5722;
            color: white;
            transform: scale(1.08);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
        }

        .food {
            position: absolute;
            font-size: 40px;
            animation: float 12s linear infinite;
            opacity: 0.8;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh);
            }

            100% {
                transform: translateY(-120px);
            }
        }

        header {
            background: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header h2 {
            color: #ff5722;
        }

        .banner {
            background: #111;
            padding: 40px;
            text-align: center;
        }

        .banner input {
            padding: 10px;
            width: 250px;
        }

        .banner button {
            padding: 10px 15px;
            background: #ff5722;
            color: white;
            border: none;
        }

        .menu {
            padding: 40px;
        }

        .menu h2 {
            font-family: Sans-Serif, Verdana;
            text-align: center;
            margin-bottom: 30px;
        }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .food-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .food-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
        }

        .food-card h3 {
            margin: 10px 0;
        }

        .food-card p {
            color: green;
        }

        .food-card input {
            width: 50px;
            margin: 8px 0;
        }

        .checkout-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin: 40px;
        }

        .order-section {
            flex: 1;
            min-width: 320px;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
            position: relative;
            overflow: hidden;
            border: 1px solid #f0f0f0;
        }

        .order-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #ff5722, #ffeb3b);
        }

        .order-section h3.section-title {
            margin-bottom: 25px;
            color: #333;
            font-size: 26px;
            font-weight: 900;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .cart-item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            margin-bottom: 12px;
            background: #fafafa;
            border-radius: 12px;
            border: 1px solid #eee;
            font-size: 18px;
            transition: all 0.3s;
        }

        .cart-item-row:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-color: #ff5722;
            background: white;
            transform: translateX(5px);
        }

        .cart-total-row {
            display: flex;
            justify-content: space-between;
            padding: 20px 0 0 0;
            margin-top: 25px;
            border-top: 2px dashed #ddd;
            font-size: 26px;
            font-weight: 900;
            color: #ff5722;
            letter-spacing: 0.5px;
        }

        #payment {
            width: 100%;
            padding: 16px 20px;
            font-size: 18px;
            font-weight: bold;
            color: #444;
            border: 2px solid #eee;
            border-radius: 12px;
            outline: none;
            transition: 0.3s;
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="%23ff5722" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 15px center/18px;
            background-color: #fafafa;
            cursor: pointer;
        }

        #payment:focus {
            border-color: #ff5722;
            background-color: white;
        }

        .checkout-btn {
            margin-top: 25px;
            width: 100%;
            padding: 18px;
            background: linear-gradient(90deg, #ff5722, #ff9800);
            color: white;
            font-size: 20px;
            font-weight: 900;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(255, 87, 34, 0.25);
            transition: 0.4s;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .checkout-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(255, 87, 34, 0.4);
        }

        .token-box {
            width: 400px;
            background: white;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .token {
            font-size: 35px;
            color: red;
            font-weight: bold;
            margin: 20px 0;
        }

        .details {
            text-align: left;
            margin-top: 20px;
            font-size: 18px;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        .navbar .nav-left {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #ff5722;
            font-size: 24px;
            font-weight: 900;
        }

        .navbar .nav-left img {
            height: 45px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar .nav-links {
            display: flex;
            gap: 25px;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #444;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            letter-spacing: 0.5px;
        }

        .navbar .nav-links a:hover,
        .navbar .nav-links a.active-link {
            color: #ff5722;
        }

        /* HERO TAGLINE */
        .hero-tagline {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-size: 70px;
            font-weight: 900;
            text-align: center;
            line-height: 1.1;
            letter-spacing: 2px;
            text-transform: uppercase;
            z-index: 10;
        }

        .hero-tagline .line1 {
            color: #ffffff;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
        }

        .hero-tagline .line2 {
            color: #ffeb3b;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
        }

        .hero-tagline .line3 {
            background: linear-gradient(90deg, #ff5722, #ffeb3b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.4));
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-left">
            <img src="logo.jpg" alt="Logo" id="navLogo"
                style="height: 45px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
            <span>ATMIYA SMART CANTEEN</span>
        </div>
        <div class="nav-links">
            <a onclick="goToPage('landing', this)" class="active-link">Home</a>
            <a id="nav-menu" onclick="goToPage('menuPage', this)">Menu</a>
            <a onclick="goToPage('aboutPage', this)">About</a>
            <a onclick="goToPage('contactPage', this)">Contact</a>
        </div>
    </nav>

    <!-- LANDING -->
    <div id="landing" class="page active">
        <div class="food" style="left:10%;animation-delay:0s">🍕</div>
        <div class="food" style="left:30%;animation-delay:3s">🍔</div>
        <div class="food" style="left:50%;animation-delay:5s">🍟</div>
        <div class="food" style="left:70%;animation-delay:2s">🍩</div>
        <div class="food" style="left:85%;animation-delay:4s">☕</div>

        <h1 class="hero-tagline">
            <span class="line1" style="display:block;">Order Smart,</span>
            <span class="line2" style="display:block;">Eat Fast,</span>
            <span class="line3" style="display:block;">Save Time.</span>
        </h1>

    </div>

    <!-- MENU PAGE -->
    <div id="menuPage" class="page" style="padding-top: 80px;">

        <div class="banner">
            <input id="searchBox" placeholder="Search for food" onkeyup="searchFood()">
            <button>Search</button>
        </div>

        <div class="menu">
            <h2>FOOD MENU</h2>

            <div class="food-grid">
                <div class="food-card">
                    <img src="https://www.sharmispassions.com/wp-content/uploads/2012/12/cardamom-tea4-500x500.jpg">
                    <h3>Tea</h3>
                    <p>₹10</p>
                    Qty <input type="number" min="0" value="0" data-name="Tea" data-price="10">
                </div>

                <div class="food-card">
                    <img src="https://vaya.in/recipes/wp-content/uploads/2018/05/Coffee.jpg">
                    <h3>Coffee</h3>
                    <p>₹10</p>
                    Qty <input type="number" min="0" value="0" data-name="Coffee" data-price="10">
                </div>

                <div class="food-card">
                    <img src="https://pastrychefonline.com/wp-content/uploads/2015/01/sliced-sandwich.jpg">
                    <h3>Bread Butter</h3>
                    <p>₹20</p>
                    Qty <input type="number" min="0" value="0" data-name="Bread Butter" data-price="20">
                </div>

                <div class="food-card">
                    <img src="https://aartimadan.com/wp-content/uploads/2021/08/veg-masala-toast-sandwich.jpg">
                    <h3>Masala Sandwich</h3>
                    <p>₹30</p>
                    Qty <input type="number" min="0" value="0" data-name="Masala Sandwich" data-price="30">
                </div>

                <div class="food-card">
                    <img
                        src="https://www.shutterstock.com/image-photo/veg-grilled-sandwich-served-ketchup-260nw-1880490184.jpg">
                    <h3>Veg. Cheese Toast</h3>
                    <p>₹70</p>
                    Qty <input type="number" min="0" value="0" data-name="Veg. Cheese Toast" data-price="70">
                </div>

                <div class="food-card">
                    <img src="https://www.spiceupthecurry.com/wp-content/uploads/2014/04/batata-poha-recipe-1.jpg">
                    <h3>Poha</h3>
                    <p>₹30</p>
                    Qty <input type="number" min="0" value="0" data-name="Poha" data-price="30">
                </div>

                <div class="food-card">
                    <img src="https://www.fifteenspatulas.com/wp-content/uploads/2011/09/French-Fries-Recipe.jpg">
                    <h3>Salted French Fries</h3>
                    <p>₹50</p>
                    Qty <input type="number" min="0" value="0" data-name="Salted French Fries" data-price="50">
                </div>

                <div class="food-card">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNoB-PsEv014Kgg673eZRb3GHwLamwrlMHUw&s">
                    <h3>Steam Dhokla</h3>
                    <p>₹40</p>
                    Qty <input type="number" min="0" value="0" data-name="Steam Dhokla" data-price="40">
                </div>

                <div class="food-card">
                    <img src="https://www.awesomecuisine.com/wp-content/uploads/2018/07/cabbage_manchurian_dry.jpg">
                    <h3>Dry Manchurian</h3>
                    <p>₹70</p>
                    Qty <input type="number" min="0" value="0" data-name="Dry Manchurian" data-price="70">
                </div>

                <div class="food-card">
                    <img src="https://i.ytimg.com/vi/HToinNNWISU/maxresdefault.jpg">
                    <h3>Dragon Potato</h3>
                    <p>₹90</p>
                    Qty <input type="number" min="0" value="0" data-name="Dragon Potato" data-price="90">
                </div>

                <div class="food-card">
                    <img src="https://mummykitchen.in/wp-content/uploads/2025/01/Veg-Chinese-bhel.jpg">
                    <h3>Chinese Bhel</h3>
                    <p>₹70</p>
                    Qty <input type="number" min="0" value="0" data-name="Chinese Bhel" data-price="70">
                </div>

                <div class="food-card">
                    <img src="https://www.indianhealthyrecipes.com/wp-content/uploads/2021/07/hakka-noodles-recipe.jpg">
                    <h3>Veg. Hakka Noodles</h3>
                    <p>₹80</p>
                    Qty <input type="number" min="0" value="0" data-name="Veg. Hakka Noodles" data-price="80">
                </div>

                <div class="food-card">
                    <img
                        src="https://media-assets.swiggy.com/swiggy/image/upload/f_auto,q_auto,fl_lossy/bg5wvyhf6xo3qb9cqrfl">
                    <h3>Veg. Maggi</h3>
                    <p>₹50</p>
                    Qty <input type="number" min="0" value="0" data-name="Veg. Maggi" data-price="50">
                </div>

                <div class="food-card">
                    <img
                        src="https://cookingwithpree.com/wp-content/uploads/2020/11/tiffin-sambar-instant-pot-instagram-5.jpg">
                    <h3>Idli Sambhar</h3>
                    <p>₹50</p>
                    Qty <input type="number" min="0" value="0" data-name="Idli Sambhar" data-price="50">
                </div>

                <div class="food-card">
                    <img
                        src="https://img-global.cpcdn.com/recipes/4732979e5a5e87fd/680x781cq80/paper-dosa-recipe-main-photo.jpg">
                    <h3>Paper Dhosa</h3>
                    <p>₹60</p>
                    Qty <input type="number" min="0" value="0" data-name="Paper Dhosa" data-price="60">
                </div>

                <div class="food-card">
                    <img src="https://myfoodstory.com/wp-content/uploads/2025/08/Mysore-Masala-Dosa-Recipe-3.jpg">
                    <h3>Mysore Masala Dhosa</h3>
                    <p>₹80</p>
                    Qty <input type="number" min="0" value="0" data-name="Mysore Masala Dhosa" data-price="80">
                </div>

            </div>
        </div>

        <div class="checkout-container">
            <div class="order-section">
                <h3 class="section-title">🛒 Your Cart</h3>
                <div id="cartItems"></div>
                <div id="cartTotalContainer"></div>
            </div>

            <div class="order-section">
                <h3 class="section-title">💳 Payment Method</h3>
                <select id="payment">
                    <option>Cash on Counter</option>
                    <option>UPI</option>
                </select>
                <form id="checkoutForm" method="post" action="placeorder.php">
                    <input type="hidden" name="items" id="hiddenItems">
                    <input type="hidden" name="quantity" id="hiddenQuantity">
                    <input type="hidden" name="total" id="hiddenTotal">
                    <input type="hidden" name="payment" id="hiddenPayment">
                    <input type="hidden" name="date" id="hiddenDate">
                    <button type="submit" class="checkout-btn" onclick="prepareOrder(event)">Complete Order</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ABOUT PAGE -->
    <div id="aboutPage" class="page" style="padding-top: 120px; min-height: 100vh; background: #fafafa;">
        <div
            style="max-width: 800px; margin: 0 auto; background: #1a1a1a; padding: 50px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); text-align: center; border: 1px solid #333;">
            <h2 style="color: #ff5722; margin-bottom: 25px; font-size: 32px;">About Us</h2>
            <p style="font-size: 20px; line-height: 1.8; color: #e0e0e0;">Welcome to Atmiya Canteen! We serve the most
                delicious and hygienic food for our beloved students and staff. Quality ingredients, modern ambiance,
                and hot food are our absolute promises. Enjoy your meals!</p>
        </div>
    </div>

    <!-- CONTACT PAGE -->
    <div id="contactPage" class="page" style="padding-top: 120px; min-height: 100vh; background: #fafafa;">
        <div
            style="max-width: 800px; margin: 0 auto; background: #1a1a1a; padding: 50px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); text-align: center; border: 1px solid #333;">
            <h2 style="color: #ff5722; margin-bottom: 25px; font-size: 32px;">Contact Us</h2>
            <p style="font-size: 20px; line-height: 1.8; color: #e0e0e0;">Have any feedback, catering requests, or
                special
                queries?</p>
            <p style="font-size: 22px; color: #ffffff; margin-top: 20px; font-weight: bold;">📧 canteen@atmiya.edu</p>
            <p style="font-size: 22px; color: #ffffff; font-weight: bold;">📞 +91 9876543210</p>
        </div>
    </div>

    <!-- TOKEN -->


    <script>
        function goToPage(pageId, linkElement = null) {
            document.querySelectorAll(".page").forEach(p => p.classList.remove("active"));
            document.getElementById(pageId).classList.add("active");

            document.querySelectorAll(".navbar .nav-links a").forEach(a => a.classList.remove("active-link"));
            if (linkElement) {
                linkElement.classList.add("active-link");
            } else if (pageId === 'menuPage') {
                document.getElementById('nav-menu').classList.add("active-link");
            }
        }

        function searchFood() {
            let input = document.getElementById("searchBox").value.toLowerCase();
            document.querySelectorAll(".food-card").forEach(card => {
                let name = card.querySelector("h3").innerText.toLowerCase();
                card.style.display = name.includes(input) ? "block" : "none";
            });
        }

        function updateCart() {
            let inputs = document.querySelectorAll('.food-card input[type="number"]');
            let box = document.getElementById("cartItems");
            let totalContainer = document.getElementById("cartTotalContainer");

            box.innerHTML = "";
            let total = 0;
            let hasItems = false;

            inputs.forEach(i => {
                let qty = parseInt(i.value) || 0;
                if (qty > 0) {
                    hasItems = true;
                    let name = i.dataset.name;
                    let price = Number(i.dataset.price);
                    let subtotal = qty * price;
                    total += subtotal;
                    box.innerHTML += `<div class="cart-item-row">
                        <span><strong>${name}</strong> <span style="color:#777; font-size:16px;">(x${qty})</span></span>
                        <span style="font-weight:900; color:#ff5722;">₹${subtotal}</span>
                    </div>`;
                }
            });

            if (!hasItems) {
                box.innerHTML = `<div style="text-align:center; padding: 40px 0; color:#999;">
                    <svg style="width:60px; opacity:0.3; margin-bottom:15px;" fill="currentColor" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A1.003 1.003 0 0 0 20 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    <p style='font-style:italic; font-size:18px;'>Your cart is hungry!</p>
                </div>`;
                totalContainer.innerHTML = "";
            } else {
                totalContainer.innerHTML = `<div class="cart-total-row">
                    <span>Grand Total:</span>
                    <span>₹${total}</span>
                </div>`;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            let fidCounter = 1;
            document.querySelectorAll('.food-card input[type="number"]').forEach(input => {
                input.dataset.fid = fidCounter++;
                input.addEventListener('input', updateCart);
                input.addEventListener('change', updateCart);
            });
            updateCart();
        });

        function prepareOrder(event) {
            let inputs = document.querySelectorAll('[data-price]');
            let items = [];
            let total = 0;
            let totalQty = 0;
            let cartData = [];

            inputs.forEach(i => {
                let qty = parseInt(i.value) || 0;
                if (qty > 0) {
                    items.push(`${i.dataset.name} x${qty}`);
                    total += qty * Number(i.dataset.price);
                    totalQty += qty;
                    cartData.push({
                        id: i.dataset.fid,
                        name: i.dataset.name,
                        qty: qty,
                        price: i.dataset.price
                    });
                }
            });

            if (items.length === 0) {
                alert("Please select items");
                event.preventDefault();
                return;
            }

            document.getElementById("hiddenItems").value = items.join(", ");
            document.getElementById("hiddenQuantity").value = totalQty;
            document.getElementById("hiddenTotal").value = total;
            document.getElementById("hiddenPayment").value = document.getElementById('payment').value;

            // Generate a hidden input to pass raw array structure to PHP
            let cartDataField = document.getElementById("hiddenCartData");
            if (!cartDataField) {
                cartDataField = document.createElement("input");
                cartDataField.type = "hidden";
                cartDataField.id = "hiddenCartData";
                cartDataField.name = "cart_data";
                document.getElementById('checkoutForm').appendChild(cartDataField);
            }
            cartDataField.value = JSON.stringify(cartData);
        }
    </script>

</body>

</html>