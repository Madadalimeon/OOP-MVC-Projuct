<?php
include ("../include/header.php")
?>

<br><br><br><br><br><br><br>
  <style>
    body {
      background-color: #fff;
      font-family: 'Poppins', sans-serif;
    }

    .breadcrumb {
      background: transparent;
      font-size: 14px;
    }

    .product-section {
      padding: 60px 5%;
    }

    .product-image img {
      width: 100%;
      border-radius: 10px;
      object-fit: contain;
      background-color: #f8f8f8;
    }

    .product-title {
      font-weight: 600;
      font-size: 28px;
      margin-bottom: 10px;
    }

    .price {
      font-size: 22px;
      font-weight: 600;
      color: #e74c3c;
    }

    .old-price {
      text-decoration: line-through;
      color: #888;
      margin-right: 10px;
    }

    .quantity-box {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      width: fit-content;
      border-radius: 5px;
      overflow: hidden;
    }

    .quantity-box button {
      border: none;
      background: none;
      padding: 8px 14px;
      font-size: 18px;
      font-weight: bold;
    }

    .quantity-box input {
      border: none;
      width: 50px;
      text-align: center;
      font-size: 16px;
    }

    .buy-btn {
      background-color: #111;
      color: #fff;
      border: none;
      padding: 12px 30px;
      border-radius: 5px;
      margin-left: 10px;
      transition: all 0.3s ease;
    }

    .buy-btn:hover {
      background-color: #333;
    }

    .stock-text {
      color: green;
      font-weight: 500;
    }

    .limited-text {
      color: red;
      font-size: 14px;
      margin-top: -5px;
    }

    .sale-badge {
      position: absolute;
      top: 20px;
      left: 20px;
      background: #e74c3c;
      color: #fff;
      padding: 5px 10px;
      font-size: 13px;
      border-radius: 3px;
    }
  </style>
</head>
<body>

 
  <section class="product-section">
    <div class="row align-items-center">
      
      <!-- Product Image -->
      <div class="col-lg-6 position-relative">
        <span class="sale-badge">Sale 20%</span>
        <div class="product-image">
          <img src="https://via.placeholder.com/600x600?text=Product+Image" alt="Product">
        </div>
      </div>

      <!-- Product Details -->
      <div class="col-lg-6 mt-4 mt-lg-0">
        <h2 class="product-title">ZEAL</h2>
        <p><strong>SKU:</strong> 357989</p>
        <p><strong>Availability stock:</strong> <span class="stock-text"></span></p>
        <h4 class="mt-3">
          <span class="price">Rs.3,999.00</span>
        </h4>
        <hr>
        <p><strong>Subtotal:</strong> Rs.3,999.00</p>

        <div class="d-flex align-items-center mt-3">
          <label class="me-3 fw-semibold">Quantity:</label>
          <div class="quantity-box">
            <button id="minus">-</button>
            <input type="text" id="quantity" value="1">
            <button id="plus">+</button>
          </div>
          <button class="buy-btn">BUY NOW</button>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Quantity control
    const plus = document.getElementById('plus');
    const minus = document.getElementById('minus');
    const qty = document.getElementById('quantity');

    plus.addEventListener('click', () => {
      qty.value = parseInt(qty.value) + 1;
    });
    minus.addEventListener('click', () => {
      if (qty.value > 1) qty.value = parseInt(qty.value) - 1;
    });
  </script>

<br><br><br><br><br><br><br><br><br><br><br>

<?php
include ("../include/footer.php")
?>
