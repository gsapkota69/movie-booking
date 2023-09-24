<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="./css/movie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <?php 
    $movie = $_GET["movie"];
    $conn = mysqli_connect("localhost", "root", "", "movies");
    $table_sql = "SELECT * FROM `comingsoon` WHERE `title` = '$movie'";
    $table_query = mysqli_query($conn, $table_sql);
    $movie_data = mysqli_fetch_assoc($table_query);
    if(!$movie_data>0){
            die("No data found");
    }
?>
</head>
<body>
<div class="container">
        <div class="row bg-white py-4 shadow-lg">
            <div class="col-md-4">
                <div class="movie-image">
                <img src="<?php echo($movie_data['images']) ?>" alt=""></div>
        </div>
        <div class="col-md-8">
                <div class="movie-description mt-5">
                <h1><?php echo($movie_data['name']);?></h1>
                <p><?php echo($movie_data['description']);?></p>
            </div>
        </div>
        </div>
</div>
</body>
</html>      