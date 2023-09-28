<?php

session_start();
if (!isset($_SESSION['id'])) {
    echo ("<script>alert('Login to continue'); window.location.href='login.php';</script>");
}
$id          = $_GET['id'];
$conn        = mysqli_connect("localhost", "root", "", "movies");
$table_sql   = "SELECT * FROM `users` WHERE `id` = '$id'";
$table_query = mysqli_query($conn, $table_sql);
$movie_data  = mysqli_fetch_assoc($table_query);
if (!$movie_data > 0) {
    die("No data found");
}
$sql = "DELETE FROM `users` WHERE `users`.`id` = '$id'";
mysqli_query($conn, $sql);
header("Location: admin.php");

?>