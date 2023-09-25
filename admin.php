<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['isAdmin'] != true)
{
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
    <main>
        <div class="addData">
            <span class="titles">Edit Users</span>

        </div>
        <div class="addData">
            <span class="titles">Edit Admins</span>
        </div>
        <div class="addData">
            <span class="titles">Edit NowShowing</span>
            <div class="innersection">

                <?php
                $conn        = mysqli_connect("localhost", "root", "", "movies");
                $table_sql   = "SELECT * FROM `nowshowing`";
                $table_query = mysqli_query($conn, $table_sql);
                $movie_data  = mysqli_fetch_assoc($table_query);
                if (!$movie_data > 0) {
                    die("No data found");
                } else {
                    while ($movie_data = mysqli_fetch_assoc($table_query)) {
                        $title = $movie_data['title'];
                        $link  = $movie_data['images'];
                        echo ("<div><a href='nowshowing.php?movie=$title'>Movie</a>  </div>");
                    }
                }
                ?>
            </div>
        </div>
        <div class="addData">
            <span class="titles">Edit ComingSoon</span>
            <div class="innersection">
                <?php
                $conn        = mysqli_connect("localhost", "root", "", "movies");
                $table_sql   = "SELECT * FROM `comingsoon`";
                $table_query = mysqli_query($conn, $table_sql);
                $movie_data  = mysqli_fetch_assoc($table_query);
                if (!$movie_data > 0) {
                    die("No data found");
                } else {
                    while ($movie_data = mysqli_fetch_assoc($table_query)) {
                        $title = $movie_data['title'];
                        $link  = $movie_data['images'];
                        echo ("<div><a href='comingsoon.php?movie=$title'>Movie</a>  </div>");
                    }
                }
                ?>
            </div>
        </div>
        <main>
</body>

</html>