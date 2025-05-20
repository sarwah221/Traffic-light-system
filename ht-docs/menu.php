<?php
session_start();
if (!empty($_SESSION['pseudo'])) {
    echo "You are logged in as <b>" . $_SESSION['pseudo'] . "</b> (<a href='destroy_session.php'>logout</a>)";
} else {
echo "You are not logged in.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My toy website</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script>
    let mode = "EURtoSEK";

    function displayConverter() {
        const popup = document.getElementById('popup');
        const contents = document.getElementById('contents');
        const currentValue = popup.style.display;

        if (currentValue === 'block') {
            popup.style.display = 'none';
            contents.style.width = '100%'; 
        } else {
            popup.style.display = 'block';
            contents.style.width = '80%';
        }
    }

    function convert() {
        const input = parseFloat(document.getElementById('euprice').value);
        const rate = parseFloat(document.getElementById('rate').value);
        let result;

        if (mode === "EURtoSEK") {
            result = input * rate;
            document.getElementById('sekprice').innerHTML = `Price in SEK: ${result.toFixed(2)}`;
        } else {
            result = input / rate;
            document.getElementById('sekprice').innerHTML = `Price in EUR: ${result.toFixed(2)}`;
        }
    }

    function switchDirection() {
        if (mode === "EURtoSEK") {
            mode = "SEKtoEUR";
            document.getElementById('priceLabel').innerText = "Price in SEK";
            document.getElementById('sekprice').innerText = "Result in EUR";
        } else {
            mode = "EURtoSEK";
            document.getElementById('priceLabel').innerText = "Price in EUR";
            document.getElementById('sekprice').innerText = "Result in SEK";
        }
    }
	function displayLoginScreen() {
		document.getElementById('loginscreen').style.display = 'block';
	}
</script>

</head>
<body>
	<div class="blue_gray_title">
	<h2>My Website</h2>
</div>
	<div class="central_part">
	   <div class="left_menu">
	  <ul>
	    <li><a href="page1.html">Page1</a></li>
	    <li><a href="page2.html">Page2</a></li>
	    <li><a href="page3.html">Page3</a></li>
	</ul>
	
	<button type="button" onclick="displayConverter();" 
  <?php if (!isset($_SESSION['can_use_converter']) || $_SESSION['can_use_converter'] != 1) echo 'disabled'; ?>>
  Open converter
</button>
	<button onclick="displayLoginScreen();">Login</button>
	</div>
	<div id="contents">
	<h2>Contents</h2>
	  <p>
		Welcome to Our Website
We’re so glad you’re here.

At the heart of what we do is a simple belief: great things happen when passion meets purpose. Whether you’re looking to launch something new, improve what you already have, or just need a bit of inspiration — you’ve come to the right place.

We specialize in delivering high-quality, tailored solutions that reflect your unique goals and vision. From the first conversation to the final result, we focus on creating meaningful, lasting outcomes that truly make a difference. No cookie-cutter answers here.
Explore our services to see how we can support you. Whether it's creative design, strategic planning, branding, development, or something in between, our experienced team is ready to help you move forward with clarity and confidence.
</p>
    </div>
	<div id="popup" class="w3-animate-right" style= "display: none;">
	
	 <h3>Currency converter</h3>
	 <label id="priceLabel">Price in EUR</label>
	<input type="text" id="euprice">
	<br>
	<label id="rateLabel">Rate</label>
	<input type="text" id="rate" value="11.2">
	<br>
	<div id="sekprice" style="margin-top:30px;color:green;">Price in SEK</div>
       	<button style="margin-top:30px" type="button" onclick="convert();">
	Perform
	</button>
	<button type="button" onclick="switchDirection();">Switch EUR ⇄ SEK</button>
	</div>
	<div id="loginscreen" class="w3-animate-zoom" style="display: none;">
	<form action="login.php" method="post">
<h3>Login</h3>
<label>Pseudo</label><br>
<input type="text" name="pseudo"><br>
<label>Password</label><br>
<input type="text" name="password"><br><br>
<input type="submit" value="Login"><br><br>
<a href="create_user.html">Not registered yet?</a>
</form>
</div>
</div>

<div class="footer">
<p>Copyright Webbsystem Course, 2025</p>
</div>

	

</body>
</html>