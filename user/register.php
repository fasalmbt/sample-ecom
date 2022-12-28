<?php

session_start();

$db = mysqli_connect('localhost', 'fasal', 'fasal0123', 'ecommerce');

if (isset($_POST['submit'])) {
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$first_name','$last_name','$email','$username','$hashed_password')";
  mysqli_query($db, $query);
}

mysqli_close($db);

?>

<!DOCTYPE html>
<html>

<head>
  <title>E-Commerce Site - admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
  <form action="register.php" method="post" class="box">
  <div class="field">
      <label class="label" for="first_name">First name:</label>
      <div class="control">
        <input class="input" type="text" name="first_name" id="first_name">
      </div>
    </div>
    <div class="field">
      <label class="label" for="second_name">Second name:</label>
      <div class="control">
        <input class="input" type="text" name="second_name" id="second_name">
      </div>
    </div>
    <div class="field">
      <label class="label" for="email">Email:</label>
      <div class="control">
        <input class="input" type="email" name="email" id="email">
      </div>
    </div>
    <div class="field">
      <label class="label" for="username">Username:</label>
      <div class="control">
        <input class="input" type="text" name="username" id="username">
      </div>
    </div>
    <div class="field">
      <label class="label" for="password">Password:</label>
      <div class="control">
        <input class="input" type="password" name="password" id="password">
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input class="button is-primary" type="submit" name="submit" value="Register">
      </div>
    </div>
    <p>Already have an account? Login <a href="/ecommerce/user/login.php">here</a>
  </form>
</body>

</html>