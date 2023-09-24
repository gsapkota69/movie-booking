<?php
session_start();
ini_set("display_errors",1);
include "config.php";
$showAlert = false;
$pswdMismatch = false;

$username=$password=$email=$confirm_password='';
$username_err=$password_err=$email_err=$confirm_password='';


  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    //Validate username

    if(empty(trim($_POST["username"]))){
          $username_err = "Please enter a username";
        }else{
          $sql = "SELECT `id` FROM `ichigo` WHERE `username` = '$username' ";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if($num > 0){
            $username_err = "Username already taken !";
          }else{
            $username = trim($_POST['username']);
          }
        }


        //Validate passowrd
        if(empty(trim($_POST["password"]))){
          $password_err = "Please enter password";
        }elseif(strlen(trim($_POST["password"]))<6){
          $password_err = "Password must have atleast 6 characters";
        }else{
          $password = trim($_POST["password"]);
        }

        //validate confirm password
      if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password";
      }else{
        if(empty($password_err) && ($password != $confirm_password)){
          $confirm_password_err = "password did not match";
        }
        else{
          $confirm_password = trim($_POST["confirm_password"]);
        }
      }

      if(empty($username_err) || empty($password_err) || empty($email_err) || empty($confirm_password_err)){          
        $query = "INSERT INTO `ichigo`(`username`,`password`,`email`) VALUES ('$username','$password', '$email')";
        $result = mysqli_query($conn, $query);
        // var_dump($result);
        if($result){
          $showAlert = true;
          header('location:login.php');
  
      }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="register.php" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="confirm_password" type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>