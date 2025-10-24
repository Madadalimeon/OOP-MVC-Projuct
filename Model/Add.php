<?php
 include 'connection.php';
class AddDB{
    private $product_name;
    private $product_price;
    private $stock;
    private $product_image;
    public function __construct($product_name, $product_price, $stock, $product_image){
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->stock = $stock;
        $this->product_image = $product_image;
        $this->addProduct($this->product_name, $this->product_price, $this->stock, $this->product_image);
    }       
    public function addProduct($product_name, $product_price, $stock, $product_image) {
    $database = new Database();
    $db = $database->getDB();
    $insert_query = "INSERT INTO products (Products_name, Products_img, Products_price, Products_Stock) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($insert_query);
    $stmt->bind_param("ssdi", $product_name, $product_image, $product_price, $stock);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
public function updateProduct($product_name, $product_price, $stock, $product_image) {
    $database = new Database();
    $db = $database->getDB();
    $update_query = "UPDATE products SET Products_name = ?, Products_img = ?, Products_price = ?, Products_Stock = ? WHERE id = ?";
    $stmt = $db->prepare($update_query);
    $stmt->bind_param("ssdii", $product_name, $product_image, $product_price, $stock, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

}

?>