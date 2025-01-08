<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

// Handle Update Product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    $sql = "UPDATE products SET title='$title', price='$price', description='$description', stock='$stock' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
        header('Location: admin.php');
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>Edit Product</h1>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $product['title']; ?>" required><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $product['description']; ?></textarea><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required><br>

        <button type="submit" name="update_product">Update Product</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
