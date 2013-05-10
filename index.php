<?php
	if(isset($_POST['Steden'])) {
		$city = $_POST['Steden'];
		$url = "http://build.uitdatabank.be/api/events/search?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&city=" . $city . "&format=json";
		$events = json_decode(file_get_contents($url));
		$eventen = "";
		foreach($events as $e)
		{
			$eventen = "test";
		}
		if($eventen == "test") {
			header('Location: evenementen.php?city=' . $city );
		}
		else {
			echo("Sorry, er zijn geen evenementen gevonden.");
		}
	}
?>
<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Cultuurnet</title>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">

  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><div>
		<input type="text" name="Steden">
        <input id="verzendknop" value="Ok!" type="submit" />
    </form>
    
<!--	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script> -->

</body>
</html>