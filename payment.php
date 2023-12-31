<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'movies';
$movie = $_GET['movie'];
$time = $_GET['time'];

$conn = mysqli_connect($host, $user, $pass, $dbname);
if(isset($_GET['movie'])){
    $fullNameSql = "SELECT * FROM nowshowing WHERE title = '$movie'";
$fullNameQuery = mysqli_query($conn, $fullNameSql);
$fullNameDb = mysqli_fetch_assoc($fullNameQuery)['name'];
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $creditcardno = $_POST['creditcardno'];
    $occupiedSeats = $_POST['occupiedSeats'];

    // Perform server-side validation
    // You should add more specific validation rules here.
    if (empty($fullname) || empty($email) || empty($address) || empty($city) || empty($creditcardno)) {
        echo "All fields are required.";
    } else {
        // Use a regular expression to validate the credit card number
        if (!preg_match('/^[0-9]{16}$/', $creditcardno)) {
            echo "<script>alert('Invalid credit card number.')</script>";
        } else {
            $sql = "INSERT INTO payment (fullname, email, address, city, creditcardno, booked_movie, booked_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $email, $address, $city, $creditcardno, $fullNameDb, $time);
                if (mysqli_stmt_execute($stmt)) {
                    $sql = "UPDATE nowshowing SET occupiedSeats = '$occupiedSeats' WHERE title = '$movie'";
                    mysqli_query($conn, $sql);
                    echo("  
                    <script>alert('Booking Successful!');
                    window.location.href='index.php';
                        </script>");
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error in prepared statement: " . mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
    <link rel="stylesheet" href="./css/payment.css">
</head>

<body>
    <header>
        <div class="container">
            <form method="post">
                <div class="left">
                    <h3>Selected Movie and Time: </h3>
                    <input type="text" name="movie" value="<?php echo ($fullNameDb); ?>" readonly>
                    <input type="text" name="time" value="<?php echo ($time); ?>" readonly>
                    <h3>BILLING ADDRESS</h3>

                    Full name
                    <input type="text" name="fullname" placeholder="Enter name" required>
                    Email
                    <?php $emailSession = $_SESSION['email']; ?>
                    <input type="text" name="email" placeholder="Enter email" value="<?php echo($emailSession);?>" readonly required> <br>

                    Address
                    <input type="text" name="address" placeholder="Enter address" required>

                    City
                    <input type="text" name="city" placeholder="Enter City" required>
                    <div id="zip">
                    </div>
                </div>

                <div class="right">
                    <h3>PAYMENT</h3>
                    Accepted Card <br>
                    <img src="images/card1.png" width="100">
                    <img src="images/card2.png" width="50">
                    <br><br>

                    Credit card number
                    <input type="text" name="creditcardno" placeholder="Enter card number" required>

                    <!-- Remove this duplicate form submission -->
                    <!-- <input type="submit" name="submit" value="Confirm Booking"> -->

                    <!-- Keep only one submit button at the end of the form -->
                    <input type="submit" name="submit" value="Confirm Booking">
                    <div hidden id="occupiedSeats" value=""></div>
                </div>
            </form>
        </div>
    </header>
</body>

</html>