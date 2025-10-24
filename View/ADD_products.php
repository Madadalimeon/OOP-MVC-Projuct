<?php
include "../Model/Add.php";
if($_SERVER['REQUEST_METHOD']=='POST'){    
    $database = new Database();
    $db = $database->getDB();
    $AddDB = new AddDB($_POST['product_name'], $_POST['product_price'], $_POST['Stock'], $_FILES['product_image']['name']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #e3f2fd, #ffffff);
      display: flex;
      flex-direction: column;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    nav.navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
    }

    .btn-success {
      background-color: #198754;
      border: none;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    .btn-success:hover {
      background-color: #157347;
    }

    h3 {
      letter-spacing: 1px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold " href="#">My Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="#">Update</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Delect</a></li>

      </ul>
    </div>
  </div>
</nav>

<!-- Form Section -->
<div class="container d-flex align-items-center justify-content-center flex-grow-1">
  <div class="row justify-content-center w-100">
    <div class="col-md-6 col-lg-5">
      <div class="card p-4 mt-4">
        <h3 class="text-center mb-4 text-success fw-bold">Add New Product</h3>

        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="product_name" class="form-label fw-semibold">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
          </div>

          <div class="mb-3">
            <label for="product_price" class="form-label fw-semibold">Product Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Enter product price" required>
          </div>

          <div class="mb-3">
            <label for="product_image" class="form-label fw-semibold">Product Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image" required>
          </div>

          <div class="mb-3">
            <label for="stock" class="form-label fw-semibold">Stock</label>
            <input type="number" class="form-control" id="stock" name="Stock" placeholder="Enter available stock" required>
          </div>

          <button type="submit" class="btn btn-success w-100 py-2">Add Product</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
