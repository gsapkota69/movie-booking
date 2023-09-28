<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<body>
    <main>
        <div class="addData">
            <h1>Edit Now Showing</h1>
            <form method="POST" action="editmovies.php"> <!-- Create a form to submit updates -->
                <div class="innersection">

                    <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                    <?php
                    $conn        = mysqli_connect("localhost", "root", "", "movies");
                    $table_sql   = "SELECT * FROM `nowshowing`";
                    $table_query = mysqli_query($conn, $table_sql);
                    if (!mysqli_num_rows($table_query) > 0) {
                        echo ("No data found");
                    } else {
                        while ($movie_data = mysqli_fetch_assoc($table_query)) {
                            $title  = $movie_data['title'];
                            $name   = $movie_data['name'];
                            $description  = $movie_data['description'];
                            $images = $movie_data['images'];
                            echo ("
                            <div>
                            <form method='POST' action='editmovies.php'>
                            <table class='table'>
    <thead>
        <tr>
            <th scope='col'>title</th>
            <th scope='col'>Name</th>
            <th scope='col'>Description</th>
            <th scope='col'>Image</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope='row'> <input type='text' name='title' value='$title'></th>
            <td>   <input type='text' name='name' value='$name'></td>
            <td> <input type='text' name='description' value='$description '></td>
            <td><input type='text' name='username' value='$images'></td>
            <td><button class='btn btn-primary'><a href='editmovies.php' class='text-light'>Edit</a></button></td>

            <td><button class='btn btn-danger'><a href='' class='text-light'>Delete</a></button></td>

        </tr>
       
    </tbody>
</table>
</form>
                            </div>      
                            ");
                        }
                    }
                    ?>
                </div>
            </form>
        </div>

        <div class="addData">
            <h1>Edit Coming soon</h1>
            <form method="POST" action="editmovies.php"> <!-- Create a form to submit updates -->
                <div class="innersection">

                    <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                    <?php
                    $conn        = mysqli_connect("localhost", "root", "", "movies");
                    $table_sql   = "SELECT * FROM `comingsoon`";
                    $table_query = mysqli_query($conn, $table_sql);
                    if (!mysqli_num_rows($table_query) > 0) {
                        echo ("No data found");
                    } else {
                        while ($movie_data = mysqli_fetch_assoc($table_query)) {
                            $title  = $movie_data['title'];
                            $name   = $movie_data['name'];
                            $description  = $movie_data['description'];
                            $images = $movie_data['images'];
                            echo ("
                            <div>
                            <form method='POST' action='editmovies.php'>
                            <table class='table'>
    <thead>
        <tr>
            <th scope='col'>title</th>
            <th scope='col'>Name</th>
            <th scope='col'>Description</th>
            <th scope='col'>Image</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope='row'> <input type='text' name='title' value='$title'></th>
            <td>   <input type='text' name='name' value='$name'></td>
            <td> <input type='text' name='description' value='$description '></td>
            <td><input type='text' name='username' value='$images'></td>
            <td><button class='btn btn-primary'><a href='editmovies.php' class='text-light'>Edit</a></button></td>

            <td><button class='btn btn-danger'><a href='' class='text-light'>Delete</a></button></td>

        </tr>
       
    </tbody>
</table>
</form>
                            </div>      
                            ");
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>