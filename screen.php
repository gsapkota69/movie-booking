<!-- All Changes:
1. nowshowing.php ko 104, 110, 114 maa get method bata morning select garya ki not morning, tei anusaar pathaako xa look at the anchor.
2. screen.php maa nowshowing bata get method use garera aako time bhanne variable leko xa
3. here, Line 22-25, php wala if condition haaleko xa select garna ko laagi, match the case and name as it is written in the database
4. Check after line 48 in screen.js
5. Added esewa form in the end of the page, check line 115-127
-->
<?php
session_start();
$movie = $_GET['movie'];
if (!isset($_SESSION['id'])) {
  echo ("<script>alert('Login to continue'); window.location.href='login.php';</script>");
}
$time = $_GET['time'];
$rate = ($time == "morning" ? 200 : 350); // ternary operator use gareko xa aako time lai rate maa convert garna lai
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
      <option <?php if ($movie == "barbie")
        echo ("selected"); ?> value="<?php echo ($rate); ?>">Barbie</option>
      <option <?php if ($movie == "Transformers")
        echo ("selected"); ?> value="<?php echo ($rate); ?>">Transformers</option>
      <option <?php if ($movie == "Opp")
        echo ("selected"); ?> value="<?php echo ($rate); ?>">Oppenheimer</option>
      <option <?php if ($movie == "mi-dr")
        echo ("selected"); ?> value="<?php echo ($rate); ?>">Mission Impossible</option>
      <option <?php if ($movie == "bladerunner")
        echo ("selected"); ?> value="<?php echo ($rate); ?>">Blade Runner 2</option>
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
  <a href="payment.php"> <input type="submit" value="Confirm Purchase"></a>
  <script src="./js/screen.js"></script>
</body>

</html>