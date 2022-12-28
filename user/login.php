<?php

session_start();

$db = mysqli_connect('localhost', 'fasal', 'fasal0123', 'ecommerce');

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;

    header('Location: dashboard.php');
  } else {
    echo "Invalid username or password.";
  }
}

mysqli_close($db);

?>

<!DOCTYPE html>
<html>

<head>
  <title>E-Commerce Site - Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
  <form action="login.php" method="post" class="box">
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
        <input class="button is-primary" type="submit" name="submit" value="Log In">
      </div>
    </div>
    <p>Don't have account? Register <a href="/ecommerce/user/register.php">here</a>
  </form>
</body>

</html>