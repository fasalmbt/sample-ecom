<?php
$db = mysqli_connect('localhost', 'fasal', 'fasal0123', 'ecommerce');

$query = "SELECT * FROM products";
$result = mysqli_query($db, $query);
mysqli_close($db);
?>


<!DOCTYPE html>
<html>
<head>
  <title>E-Commerce Site</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>
<body>
  <header class="navbar">
    <div class="navbar-brand">
      <a class="navbar-item" href="#">E-Commerce Site</a>
    </div>
    <div class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="#">Home</a>
        <a class="navbar-item" href="#">Shop</a>
      </div>
      <div class="navbar-end">
        <a class="navbar-item" href="/ecommerce/user/login.php">My Account</a>
        <a class="navbar-item" href="#">Cart</a>
      </div>
    </div>
  </header>
  <main class="section">
    <div class="container">
      <h2 class="title">Available Products</h2>
      <div class="columns is-multiline">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="column is-one-quarter">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                </figure>
              </div>
              <div class="card-content">
                <h3 class="title is-4"><?php echo $row['name']; ?></h3>
                <p class="subtitle is-6">₹<?php echo $row['price']; ?></p>
                <a class="button is-fullwidth" href="/user/add_to_cart.php">Buy</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
  <footer class="footer">
    <div class="container">
      <p class="has-text-centered">Copyright 2022 E-Commerce Site</p>
    </div>
  </footer>
</body>
</html>
