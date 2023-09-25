<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
</head>

<title>Document</title>
</head>
<style>
    nav ul {
        margin-top: 0;
        margin-bottom: 0em;
    }
    img{
        height: 600px;
    }
    .owl-carousel{
        margin-top: 20px;
    }
</style>

<body>
    <nav>
        <img src="./images/booking.jpg">
        <ul>
            <li><a href="index.php">Home</a></li>
            
            <li><a href="ticketrate.html">Ticket Rate</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
        </ul>
        <?php if(isset($_SESSION["id"])){ ?>
            <a href="logout.php" id="login"><button >Logout</button></a>
        <?php }else{ ?>
            <a href="login.php" id="login"><button >Login</button></a>
        <?php } ?>
    </nav>
    <?
     $check = isset($_SESSION["id"]) ? $_SESSION["id"] : "Not Logged In";
     echo($check); ?>
    <main><div class="main-bg">
        <div class="carousel-title">Now Showing</div>
        <div class="owl-carousel">
            
        <?php
        $conn = mysqli_connect("localhost", "root", "", "movies");
        $table_sql = "SELECT * FROM `nowshowing`";
        $table_query = mysqli_query($conn, $table_sql);
        $movie_data = mysqli_fetch_assoc($table_query);
        if(!$movie_data>0){
            die("No data found"); 
        }else{
            while($movie_data = mysqli_fetch_assoc($table_query)){
                $title = $movie_data['title'];
                $link = $movie_data['images'];
                echo("<div><a href='nowshowing.php?movie=$title'><img src='$link' alt='$title'></a>  </div>");
            }
        }
        ?>
    </div>
    <div class="carousel-title">Coming Soon</div>
    <div class="owl-carousel">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "movies");
        $table_sql = "SELECT * FROM `comingsoon`";
        $table_query = mysqli_query($conn, $table_sql);
        $movie_data = mysqli_fetch_assoc($table_query);
        if(!$movie_data>0){
            die("No data found"); 
        }else{
            while($movie_data = mysqli_fetch_assoc($table_query)){
                $title = $movie_data['title'];
                $link = $movie_data['images'];
                echo("<div><a href='comingsoon.php?movie=$title'><img src='$link' alt='$title'></a>  </div>");
            }
        }
        ?>
    </div>
    </div>
    </main>
    <footer>
        <div class="transparent-layer">
        <div class="footer-content">
            <div class="footer-brand">
                <img src="./images/booking.jpg" alt="" class="footer-logo">
                <p class="slogan">Online Movie Ticket Booking System.</p>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                <div class="social-links">
                    <a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="https://twitter.com/"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="https://www.youtube.com/"><ion-icon name="logo-youtube"></ion-icon></a>
            </div>
        </div>
        <div class="footer-links">
            <ul>
                <h4 class="link-heading">GP_Movies</h4>

                <li class="link-item"><a href="#">About Us</a></li>
                <li class="link-item"><a href="#">All Movies</a></li>
                <li class="link-item"><a href="#">Ticket Rate</a></li>
                <li class="link-item"><a href="#">Contacts</a></li>

            </ul>
            <ul>
                <h4 class="link-heading">Browse</h4>

                <li class="link-item"><a href="#">Now Showing</a></li>
                <li class="link-item"><a href="#">Coming Soon</a></li>
                <li class="link-item"><a href="#">Popular</a></li>
                <li class="link-item"><a href="#">Streaming Library</a></li>

            </ul>

            <ul>
            
                <li class="link-item"><a href="#">Tv Shows</a></li>
                <li class="link-item"><a href="#">Movies</a></li>
                <li class="link-item"><a href="#">Kids</a></li>
                <li class="link-item"><a href="#">Collections</a></li>
            </ul>

            <ul>
                <h4 class="Link-heading">Help</h4>
                <li class="link-item"><a href="#">Account and Billing</a></li>
                <li class="link-item"><a href="#">Plans and Pricing</a></li>
                <li class="link-item"><a href="#">Supported Devices</a></li>
                <li class="link-item"><a href="#">Accessibility</a></li>
            </ul>

        </div>
        </div>
        <div class="footer-copyright">
            <div class="copyright">
                <p>copyright 2023 GP_Movies</p>
            </div>
            <div class="wrapper">
                <a href="#">Privacy policy</a>
                <a href="#">Terms and conditions</a>
            </div>
        </div>
    </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                items: 4,
                autoplay: true,
                loop: true,
                autoplayTimeout: 3000,
                margin: 20
            });
        });
        
       
    </script>
</body>

</html>