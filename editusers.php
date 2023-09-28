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
if (isset($_POST['updateMovies'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql      = "UPDATE `users` SET `name` = '$name', `email` = '$email', `username` = '$username', `password` = '$password' WHERE `users`.`id` = '$id'";
    mysqli_query($conn, $sql);
    header("Location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit User
                        <a href="admin.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo($movie_data['name']);?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo($movie_data['email']); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo($movie_data['username']);?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" value="<?php echo($movie_data['password']);?>">
                                </div>
                            </div>
                            <button type="submit" name="updateMovies" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>