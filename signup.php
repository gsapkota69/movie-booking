<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "movies");

if (!empty($_SESSION["id"])) {
    header("location:index.php");
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username        = $_POST['username'];
    $email           = $_POST['email'];
    $password        = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $sql    = (" SELECT * FROM users WHERE username ='$username' OR email = '$email' ");
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Username or Email Has Already Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO `users`(`name`,`username`,`email`,`password`)
            VALUES ( '$name', '$username' , '$email' , '$password' )";
            mysqli_query($conn, $query);
            setcookie("Username", $username, time() + (86400 * 30), "/");
            setcookie("Password", $password, time() + (86400 * 30), "/");
            echo "<script> alert('Registration succesful'); </script>";
            header("location: login.php");
          } else {
            echo "<script> alert('Password does not match'); </script>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
</head>
<body>
    <div class="center">
        <h1>Signup</h1>
        <form method="post">
          <div class="txt_field">
            <input name="name" type="text" required>
            <span></span>
            <label>Name</label>
          </div>
          <div class="txt_field">
            <input name="username" type="text" required>
            <span></span>
            <label>Username</label>
          </div>
          <div class="txt_field">
            <input name="email" type="text" required>
            <span></span>
            <label>Email</label>
          </div>
          <div class="txt_field">
            <input name="password" type="password" required>
            <span></span>
            <label>Password</label>
          </div>
          <div class="txt_field">
            <input name="confirmpassword" type="password" required>
            <span></span>
            <label>Confirm Password</label>
          </div>
          <input name="submit" type="submit" value="Signup">
        </form>
      </div>
  
</body>
</html>