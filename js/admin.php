<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['isAdmin'] != true) {
    header('location:loginAdmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Admin Portal</title>
</head>

<body>
    <nav>
        <a href="index.php">Home</a>
    </nav>
    <main>
        <div class="addData">
            <span class="titles">Edit Users</span>
            <div class="innersection">
                <span>Name</span><span>Email</span><span>Username</span><span>Password</span>
                <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                <?php
                $conn        = mysqli_connect("localhost", "root", "", "movies");
                $table_sql   = "SELECT * FROM `users`";
                $table_query = mysqli_query($conn, $table_sql);
                if (!mysqli_num_rows($table_query) > 0) {
                    echo ("No data found");
                } else {
                    while ($user_data = mysqli_fetch_assoc($table_query)) {
                        $id       = $user_data['id'];
                        $name     = $user_data['name'];
                        $email    = $user_data['email'];
                        $username = $user_data['username'];
                        $password = $user_data['password'];
                        echo ("
                        <span>$name</span>
                        <span>$email</span>
                        <span>$username</span>
                        <span>$password</span>
                        ");
                    }
                }
                ?>
            </div>
            <button class="add" onclick="buttonLink('users')">Edit Users <img src="./images/editing.png" height="15px"
                    width="auto"></button>
        </div>
        <div class="addData">
            <span class="titles">Edit Admins</span>
            <div class="innersection">
                <span>Name</span><span>Email</span><span>Username</span><span>Password</span>
                <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                <?php
                $conn        = mysqli_connect("localhost", "root", "", "movies");
                $table_sql   = "SELECT * FROM `admin`";
                $table_query = mysqli_query($conn, $table_sql);
                if (!mysqli_num_rows($table_query) > 0) {
                    echo ("No data found");
                } else {
                    while ($admin_data = mysqli_fetch_assoc($table_query)) {
                        $name     = $admin_data['name'];
                        $email    = $admin_data['email'];
                        $username = $admin_data['username'];
                        $password = $admin_data['password'];
                        echo ("
                        <span hidden>$id</span>
                        <span>$name</span>
                        <span>$email</span>
                        <span>$username</span>
                        <span>$password</span>
                        ");
                    }
                }
                ?>
            </div>
            <button class="add" onclick="buttonLink('admin')">Edit Admins <img src="./images/editing.png" height="15px"
                    width="auto"></button>
        </div>
        <div class="addData">
            <span class="titles">Edit NowShowing</span>
            <div class="innersection">
                <span>Title (Unique ID)</span><span>Name</span><span>Description</span><span>Image location</span>
                <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                <?php
                $conn        = mysqli_connect("localhost", "root", "", "movies");
                $table_sql   = "SELECT * FROM `nowshowing`";
                $table_query = mysqli_query($conn, $table_sql);
                if (!mysqli_num_rows($table_query) > 0) {
                    echo ("No data found");
                } else {
                    while ($movie_data = mysqli_fetch_assoc($table_query)) {
                        $title       = $movie_data['title'];
                        $name        = $movie_data['name'];
                        $description = $movie_data['description'];
                        $images      = $movie_data['images'];
                        echo ("
                        <span>$title</span>
                        <span>$name</span>
                        <span>$description</span>
                        <span>$images</span>
                        ");
                    }
                }
                ?>
            </div>
            <button class="add" onclick="buttonLink('nowshowing')" onhover=>Edit Movies <img src="./images/editing.png"
                    height="15px" width="auto"></button>
        </div>
        <div class="addData">
            <span class="titles">Edit ComingSoon</span>
            <div class="innersection">
                <span>Title (Unique ID)</span><span>Name</span><span>Description</span><span>Image location</span>
                <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                <?php
                $conn        = mysqli_connect("localhost", "root", "", "movies");
                $table_sql   = "SELECT * FROM `comingsoon`";
                $table_query = mysqli_query($conn, $table_sql);
                if (!mysqli_num_rows($table_query) > 0) {
                    echo ("No data found");
                } else {
                    while ($movie_data = mysqli_fetch_assoc($table_query)) {
                        $title       = $movie_data['title'];
                        $name        = $movie_data['name'];
                        $description = $movie_data['description'];
                        $images      = $movie_data['images'];
                        echo ("
                        <span>$title</span>
                        <span>$name</span>
                        <span>$description</span>
                        <span>$images</span>
                        ");
                    }
                }
                ?>
            </div>
            <button class="add" onclick="buttonLink('comingsoon')">Edit Movies <img src="./images/editing.png"
                    height="15px" width="auto"></button>
            <script src="./js/admin.js"></script>
        </div>
</body>

</html>