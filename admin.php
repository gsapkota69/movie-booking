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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<body>
    <!-- TAB CONTROLLERS -->
    <input id="panel-1-ctrl" class="panel-radios" type="radio" name="tab-radios" checked>
    <input id="panel-2-ctrl" class="panel-radios" type="radio" name="tab-radios">
    <input id="panel-3-ctrl" class="panel-radios" type="radio" name="tab-radios">
    
    <input id="nav-ctrl" class="panel-radios" type="checkbox" name="nav-checkbox">

    <header id="introduction">
        <h1>Admin Panel</h1>
    </header>

    <!-- TABS LIST -->
    <ul id="tabs-list">
        <!-- MENU TOGGLE -->
        <label id="open-nav-label" for="nav-ctrl"></label>
        <li id="li-for-panel-1">
            <label class="panel-label" for="panel-1-ctrl">User</label>
        </li><!--INLINE-BLOCK FIX
-->
        <li id="li-for-panel-2">
            <label class="panel-label" for="panel-2-ctrl">Movies</label>
        </li><!--INLINE-BLOCK FIX
-->
        <li id="li-for-panel-3">
            <label class="panel-label" for="panel-3-ctrl">Payment</label>
        </li><!--INLINE-BLOCK FIX
-->
        <label id="close-nav-label" for="nav-ctrl">Close</label>
    </ul>

    <!-- THE PANELS -->
    <article id="panels">
        <div class="container">
            <section id="panel-1">
            <main>
        <div class="addData">
            <h1>Edit Users</h1>
            <form method="POST" action="editusers.php"> <!-- Create a form to submit updates -->
                <div class="innersection">

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
                            <div>
                            <form method='POST' action='editusers.php'>
                            <table class='table'>
    <thead>
        <tr>
            <th scope='col'>id</th>
            <th scope='col'>Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Username</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope='row'> <input type='hidden' name='id' value='$id'></th>
            <td>   <input type='text' name='name' value='$name'></td>
            <td> <input type='text' name='email' value='$email'></td>
            <td><input type='text' name='username' value='$username'></td>
            <td><button class='btn btn-primary'><a href='editusers.php' class='text-light'>Edit</a></button></td>

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
            </section>
            <section id="panel-2">
                <main>
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
                </main>
            </section>
            <section id="panel-3">
            <main>
        <div class="addData">
            <h1>Payment Info</h1>
            <form method="POST" action="editpayment.php"> <!-- Create a form to submit updates -->
                <div class="innersection">

                    <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                    <?php
                    $conn        = mysqli_connect("localhost", "root", "", "movies");
                    $table_sql   = "SELECT * FROM `payment`";
                    $table_query = mysqli_query($conn, $table_sql);
                    if (!mysqli_num_rows($table_query) > 0) {
                        echo ("No data found");
                    } else {
                        while ($payment_data = mysqli_fetch_assoc($table_query)) {
                            $id       = $payment_data['id'];
                            $fullname     = $payment_data['fullname'];
                            $email    = $payment_data['email'];
                            $address = $payment_data['address'];
                            $city = $payment_data['city'];
                            $creditcardno = $payment_data['creditcardno'];
                            echo ("
                            <div>
                            <form method='POST' action='editpayment.php'>
                            <table class='table'>
    <thead>
        <tr>
            <th scope='col'>Id</th>
            <th scope='col'>Fullame</th>
            <th scope='col'>Email</th>
            <th scope='col'>Address</th>
            <th scope='col'>City</th>
            <th scope='col'>Creditcardno</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope='row'> <input type='hidden' name='id' value='$id'></th>
            <td>   <input type='text' name='fullname' value='$fullname'></td>
            <td> <input type='text' name='email' value='$email'></td>
            <td><input type='text' name='address' value='$address'></td>
            <td><input type='text' name='city' value='$city'></td>
            <td><input type='text' name='creditcardno' value='$creditcardno'></td>
            <td><button class='btn btn-primary'><a href='editpayment.php' class='text-light'>Edit</a></button></td>

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
            </section>
        </div>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>