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
    $table_sql = "SELECT * FROM `nowshowing` WHERE `title` = '$movie'";
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
        <div class="row bg-white py-4 my-5">
            <div class="col-md-12 ">
                <div class="d-flex justify-content-between border-bottom border-4 border-dark">
                    <div>
                        <h2>Viewing Times</h2>
                    </div>
                    <div class="d-flex">
                        <p>sold</p>
                        <p class="bg-danger p-3 rounded-circle me-2"></p>
                        <p>Fast-Filling</p>
                        <p class="bg-warning p-3 rounded-circle me-2"></p>
                        <p>Available</p>
                        <p class="bg-success p-3 rounded-circle me-2"></p>
                    </div>
                    <div class="d-flex">
                        <p class="border border-success rounded-circle mx-2"><a href="" class="p-3">today</a></p>
                        <p class="border border-success rounded-circle mx-2"><a href="" class="p-3">tomm</a></p>
                        <p class="border border-success rounded-circle mx-2"><a href="" class="p-3">aug28</a></p>
                        <p class="border border-success rounded-circle mx-2"><a href="" class="p-3">aug30</a></p>
                    </div>


                </div>
                <div class="my-3 bg-dark text-light py-3">
                    <div class="row">
                        <div class="col-md-2 bg-white text-dark p-3 rounded ms-5 ">
                            <h6 class="">New Baneshwor</h6>
                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=morning&movie=<?php echo($movie)?>">7:30 AM</a></h6>

                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=notmorning&movie=<?php echo($movie)?>">11:45 AM</a></h6>

                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=notmorning&movie=<?php echo($movie)?>">2 PM</a></h6>

                        </div>
                        
                    </div>
                   
                    
                </div>
                <div class="my-3 bg-dark text-light py-3">
                    <div class="row">
                        <div class="col-md-2 bg-white text-dark p-3 rounded ms-5 ">
                            <h6 class="">Labim Mall</h6>
                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=morning&movie=<?php echo($movie)?>">7:30 AM</a></h6>

                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=notmorning&movie=<?php echo($movie)?>">11:45 AM</a></h6>

                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=notmorning&movie=<?php echo($movie)?>">2 PM</a></h6>

                        </div>
                        
                    </div>
                </div>
                <div class="my-3 bg-dark text-light py-3">
                    <div class="row">
                        <div class="col-md-2 bg-white text-dark p-3 rounded ms-5 ">
                            <h6 class="">Chabahil</h6>
                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=morning&movie=<?php echo($movie)?>">7:30 AM</a></h6>

                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=notmorning&movie=<?php echo($movie)?>">11:45 AM</a></h6>

                        </div>
                        <div class="col-md-1 ms-5 bg-white text-dark p-3 rounded">
                            <h6><a href="screen.php?time=notmorning&movie=<?php echo($movie)?>">2 PM</a></h6>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>    
</div>        
</body>
</html>      