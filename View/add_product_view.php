<?php
include '../Model/Product.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $stock = $_POST['Stock'];
    $image = $_FILES['product_image']['name'];
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($image);
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile);
    $productModel = new Product();
    if ($productModel->addProduct($name, $price, $stock, $image)) {
        header("Location: index.php");
        exit();
    } else {
        header("Location: add_product_view.php?error=1");
        exit();
    }
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
.card {
  border: none;
  border-radius: 15px;
  box-shadow: 0 4px 25px rgba(0,0,0,0.1);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 30px rgba(0,0,0,0.15);
}
.btn-success {
  background-color: #198754;
  border: none;
  font-weight: 600;
}
.btn-success:hover {
  background-color: #157347;
}
h3 { letter-spacing: 1px; }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">My Store</a>
  </div>
</nav>

<div class="container d-flex align-items-center justify-content-center flex-grow-1">
  <div class="row justify-content-center w-100">
    <div class="col-md-6 col-lg-5">
      <div class="card p-4 mt-4">
        <h3 class="text-center mb-4 text-success fw-bold">Add New Product</h3>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success">Product added successfully!</div>
        <?php elseif(isset($_GET['error'])): ?>
            <div class="alert alert-danger">Failed to add product!</div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="product_name" class="form-label fw-semibold">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
          </div>
          <div class="mb-3">
            <label for="product_price" class="form-label fw-semibold">Product Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" required>
          </div>
          <div class="mb-3">
            <label for="product_image" class="form-label fw-semibold">Product Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image" required>
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label fw-semibold">Stock</label>
            <input type="number" class="form-control" id="stock" name="Stock" required>
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
