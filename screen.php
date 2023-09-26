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
      <div class="seat" id="seat1"></div>
      <div class="seat" id="seat2"></div>
      <div class="seat" id="seat3"></div>
      <div class="seat" id="seat4"></div>
      <div class="seat" id="seat5"></div>
      <div class="seat" id="seat6"></div>
      <div class="seat" id="seat7"></div>
      <div class="seat" id="seat8"></div>
    </div>
    <div class="row">
      <div class="seat" id="seat9"></div>
      <div class="seat" id="seat10"></div>
      <div class="seat" id="seat11"></div>
      <div class="seat" id="seat12"></div>
      <div class="seat" id="seat13"></div>
      <div class="seat" id="seat14"></div>
      <div class="seat" id="seat15"></div>
      <div class="seat" id="seat16"></div>
    </div>
    <div class="row">
    <div class="seat" id="seat17"></div>
      <div class="seat" id="seat18"></div>
      <div class="seat" id="seat19"></div>
      <div class="seat" id="seat21"></div>
      <div class="seat" id="seat22"></div>
      <div class="seat" id="seat23"></div>
      <div class="seat" id="seat24"></div>
      <div class="seat" id="seat25"></div>
    </div>
    <div class="row">
    <div class="seat" id="seat26"></div>
      <div class="seat" id="seat27"></div>
      <div class="seat" id="seat28"></div>
      <div class="seat" id="seat29"></div>
      <div class="seat" id="seat30"></div>
      <div class="seat" id="seat31"></div>
      <div class="seat" id="seat32"></div>
      <div class="seat" id="seat33"></div>
    </div>
    <div class="row">
    <div class="seat" id="seat34"></div>
      <div class="seat" id="seat35"></div>
      <div class="seat" id="seat36"></div>
      <div class="seat" id="seat37"></div>
      <div class="seat" id="seat38"></div>
      <div class="seat" id="seat39"></div>
      <div class="seat" id="seat40"></div>
      <div class="seat" id="seat41"></div>
    </div>

  </div>

  <p class="text">You have selected <span id="count">0</span> seats for a price of Rs. <span id="total">0</span></p>

  <div hidden id="occupiedArray">{}</div>

  <!-- Payment -->
  <a href="payment.php" onclick="occupySeat()"> <input type="submit" value="Confirm Purchase"></a>
  <script src="./js/screen.js"></script>
</body>

</html>