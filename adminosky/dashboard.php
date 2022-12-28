<?php

session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit;
}

$db = mysqli_connect('localhost', 'fasal', 'fasal0123', 'ecommerce');

$user_id = $_SESSION['user_id'];

$query = "SELECT username FROM administrators WHERE id='$user_id'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

$username = $user['username'];

mysqli_close($db);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                Administrator Dashboard
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    <strong>Welcome, admin</strong>
                </div>
                <div class="navbar-item">
                    <a href="/ecommerce/adminosky/add_products.php" class="button is-primary">Add Product</a>
                </div>
                <div class="navbar-item">
                    <a href="/ecommerce/adminosky/view_products.php" class="button is-primary">View Products</a>
                </div>
                <div class="navbar-item">
                    <a href="logout.php" class="button is-primary">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="section">
        <h1>Welcome to admin dashboard</h1>
    </main>
</body>

</html>