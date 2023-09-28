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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>