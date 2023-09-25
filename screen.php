

<?php
session_start();
$movie = $_GET['movie'];
if (!isset($_SESSION['id'])) {
  echo ("<script>alert('Login to continue'); window.location.href='login.php';</script>");
}
$time = $_GET['time'];
$rate = ($time == "morning" ? 200 : 350);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/screen.css">
</head>

<body>
  <div class="movie-container">
    <label for="">Pick a movie:</label>
    <select id="movie">
      <option <?php if ($movie == "barbie") echo ("selected"); ?> value="<?php echo ($rate); ?>">Barbie</option>
      <option <?php if ($movie == "Transformers") echo ("selected"); ?> value="<?php echo ($rate); ?>">Transformers</option>
      <option <?php if ($movie == "Opp") echo ("selected"); ?> value="<?php echo ($rate); ?>">Oppenheimer</option>
      <option <?php if ($movie == "mi-dr") echo ("selected"); ?> value="<?php echo ($rate); ?>">Mission Impossible</option>
      <option <?php if ($movie == "bladerunner") echo ("selected"); ?> value="<?php echo ($rate); ?>">Blade Runner 2</option>
    </select>
  </div>

  <ul class="showcase">
    <li>
      <div class="seat"></div>
      <small>N/A</small>
    </li>
    <li>
      <div class="seat selected"></div>
      <small>Selected</small>
    </li>
    <li>
      <div class="seat"></div>
      <small></small>
    </li>
  </ul>

  <div class="container">
    <div class="screen"></div>

    <div class="row">
      <div class="seat"></div> <!-- short-hand is .seat*8 and the enter key-->
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div> <!-- short-hand is .seat*8 and the enter key-->
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div> <!-- short-hand is .seat*8 and the enter key-->
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div> <!-- short-hand is .seat*8 and the enter key-->
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div> <!-- short-hand is .seat*8 and the enter key-->
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div> <!-- short-hand is .seat*8 and the enter key-->
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>

  </div>

  <p class="text">You have selected <span id="count">0</span> seats for a price of Rs. <span id="total">0</span></p>

  <!-- Payment -->
  <input type="submit" value="Confirm Purchase" id="confirmButton">

  <script src="./js/screen.js"></script>
  <script>
    document.getElementById('confirmButton').addEventListener('click', function (event) {
      var selectedSeats = document.querySelectorAll('.row .seat.selected');

      if (selectedSeats.length === 0) {
        alert('Please select at least one seat before confirming your purchase.');
        event.preventDefault(); // Prevent the default behavior (form submission)
      }
      else {
      // Redirect to payment.php when seats are selected
      window.location.href = "payment.php";
    }
    });
  </script>
</body>

</html>
