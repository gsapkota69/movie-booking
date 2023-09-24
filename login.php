<?php

$conn = mysqli_connect("localhost", "root", "", "movies");

if (!empty($_SESSION["id"])) {
    header("location:index.php");
}
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'  ");
    $row    = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {

        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"]    = $row["id"];
            echo "<script> alert('Login succesful'); </script>";
            header("Location:index.php");

        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }

    } else {
        echo "<script> alert('User not registered'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=" initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
</head>
<body>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input name="username" type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input name="password" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input name="submit" type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="signup.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
