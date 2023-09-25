<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['isAdmin'] != true)
{
	header('location:loginAdmin.php');
}
$section = $_GET['section'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Edit Data</title>
</head>

<body>
    <main>
        <?php if($section == "comingsoon" || $section == "nowshowing"){
        ?>
        <div class="addData">
            <span class="titles">Edit <?php echo($section);?></span>
            <form class="innersection">
                <span>Title (Unique ID)</span><span>Name</span><span>Description</span><span>Image location</span>
                <span class="line"></span><span class="line"></span><span class="line"></span><span class="line"></span>
                <?php
                $conn        = mysqli_connect("localhost", "root", "", "movies");
                $table_sql   = "SELECT * FROM `$section`";
                $table_query = mysqli_query($conn, $table_sql);
                $movie_data  = mysqli_fetch_assoc($table_query);
                if (!$movie_data > 0) {
                    die("No data found");
                } else {
                    while ($movie_data = mysqli_fetch_assoc($table_query)) {
                        $title = $movie_data['title'];
                        $name = $movie_data['name'];
                        $description = $movie_data['description'];
                        $images  = $movie_data['images'];
                        echo ("
                        <span><input type='text' name='title' value='$title'></span>
                        <span><input type='text' name='name' value='$name'></span>
                        <span><textarea name='description'>$description</textarea></span>
                        <span><input type='text' name='images' value='$images'></span>
                        ");
                    }
                }
                ?>
                <input id="submitButton" type="submit" name="submit" value="Submit">
            </form>
        </div>
        <?php }else if($section == "users" || $section == "admin"){
            echo("");
        }else{ 
            echo("Invalid section");
        } ?>
        </main>
</body>

</html>