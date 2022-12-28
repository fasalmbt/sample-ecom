<!DOCTYPE html>
<html>

<head>
    <title>View Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <header class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="/ecommerce/adminosky/dashboard.php"><strong>Admin panel -
                    ECommerce</strong></a>
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
            <h2 class="title">View Products</h2>
            <table class="table is-bordered is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $conn = mysqli_connect("localhost", "fasal", "fasal0123", "ecommerce");

                if (!isset($_SESSION['logged_in']) || !$_SESSION['is_admin']) {
                    $result = mysqli_query($conn, "SELECT * FROM products");
                    while ($product = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $product['product_id'] . "</td>";
                        echo "<td>" . $product['name'] . "</td>";
                        echo "<td>" . $product['description'] . "</td>";
                        echo "<td>" . $product['price'] . "</td>";
                        echo "<td>" . $product['stock'] . "</td>";
                        echo "<td><img src='" . $product['image'] . "' alt='" . $product['name'] . "'></td>";
                        echo "</tr>";
                    }
                } else {
                    header("Location: login.php");
                }
                ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>