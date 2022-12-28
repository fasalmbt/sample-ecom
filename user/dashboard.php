<?php

session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST['submit'])) {
    $db = mysqli_connect('localhost', 'fasal', 'fasal0123', 'ecommerce');

    mysqli_close($db);
}


?>

<p>This is a dashboard</p>