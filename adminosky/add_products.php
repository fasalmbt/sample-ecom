<?php

session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit;
}
if (isset($_POST['submit'])) {
    $db = mysqli_connect('localhost', 'fasal', 'fasal0123', 'ecommerce');

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $stock = mysqli_real_escape_string($db, $_POST['stock']);
    $image = mysqli_real_escape_string($db, $_POST['image']);

    $sql = "INSERT INTO products (name, description, price, stock, image) VALUES ('$name', '$description', '$price', '$stock', '$image')";
    if (mysqli_query($db, $sql)) {
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <header class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="/ecommerce/adminosky/dashboard.php"><strong>Admin panel - ECommerce</strong></a>
        </div>
        <div class="navbar-menu">
            
            <div class="navbar-end">
                <a class="navbar-item"><strong>Welcome admin,</strong></a>
                <a class="navbar-item" href="logout.php">Logout</a>
            </div>
        </div>
    </header>
    <main class="section">
        <div class="container">
            <h2 class="title">Add Product</h2>

            <form action="add_products.php" method="post">
                <div class="field">
                    <label class="label" for="name">Name:</label>
                    <div class="control">
                        <input class="input" type="text" id="name" name="name">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="description">Description:</label>
                    <div class="control">
                        <textarea class="textarea" id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="price">Price:</label>
                    <div class="control">
                        <input class="input" type="number" id="price" name="price">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="stock">Stock:</label>
                    <div class="control">
                        <input class="input" type="number" id="stock" name="stock">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="image">Image URL:</label>
                    <div class="control">
                        <input class="input" type="text" id="image" name="image">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="button is-primary" type="submit" name="submit" value="Add Product">
                    </div>
                </div>
            </form>

            <?php if (isset($message)) { ?>
            <div class="notification is-primary">
                <?php echo $message; ?>
            </div>
            <?php } ?>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <p class="has-text-centered">Copyright 2022 E-Commerce Site</p>
        </div>
    </footer>
</body>

</html>