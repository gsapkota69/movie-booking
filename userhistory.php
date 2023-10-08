<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">

    <title>Admin Portal</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<body>
<div class="addData">
    <h1>Booking History</h1>
        <div class="innersection">

            <span class="line"></span><span class="line"></span><span class="line"></span><span
                class="line"></span>
            <?php
            $conn        = mysqli_connect("localhost", "root", "", "movies");
            $id = $_SESSION["id"];
            $table_sql   = "SELECT * FROM `users` WHERE id = '$id' ";
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
<th scope='col'>Movie</th>
<th scope='col'>SeatId</th>
<th scope='col'>Cancel</th>

</tr>
</thead>
<tbody>
<tr>
<th scope='row'> <input type='hidden' name='id' value='$id'></th>
<td>   <input type='text' name='name' value='$name'></td>
<td> <input type='text' name='email' value='$email'></td>
<td><input type='text' name='username' value='$username'></td>
<td><input type='text' name='movie' value= ''></td>
<td><input type='text' name='seatid' value= ''></td>


<td><button class='btn btn-danger'><a href='#' class='text-light'>Cancel Booking</a></button></td>

</tr>

</tbody>
</table>
        </div>      
        ");
                }
            }
            ?>
        </div>
    </form>
</div>
</body>
</html>