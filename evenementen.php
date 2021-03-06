<?php
	if(isset($_GET['category']))
	{
		$category = $_GET['category'];
		$city = $_GET['city'];
		$url = "http://build.uitdatabank.be/api/events/search?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&city=" . $city ."&eventtype=" . $category . "&format=json";
	 	$events = json_decode(file_get_contents($url));
	}
	else if(isset($_GET['city']))
	{
		$city = $_GET['city'];
		$url = "http://build.uitdatabank.be/api/events/search?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&city=" . $city . "&format=json";
		$events = json_decode(file_get_contents($url));
		$category = "Alle Evenementen";


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
<!-- Header and Nav -->
  
  <div class="row">
    <div class="large-3 columns">
      <h1><img src="http://placehold.it/400x100&text=Logo" /></h1>
    </div>
    <div class="large-9 columns">
      <ul class="inline-list right">
        <li><a href="#">Eenvoudige modus</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
  
  <!-- End Header and Nav -->
  
  
  <div class="row">    
    
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-9 push-3 columns">
      
      <h3><?php echo($category) ?> <small>in <?php echo($city) ?></small></h3>
      
      <ul id="results">
      	<?php
	      	foreach($events as $e)
				{
					echo "<li><a href='evenement.php?city=" . $city . "&id=" . $e->cdbid . "'>" . $e->title . "</a></li>";
				}
		?>
      </ul>
            
    </div>
    
    
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 pull-9 columns">
        
      <ul class="side-nav">
        <li><a href="?city=<?php echo($city); ?>&category=0.14.0.0.0" >Concert</a></li>
        <li><a href="?city=<?php echo($city); ?>&category=Dansvoorstelling" >Dansvoorstelling</a></li>
      </ul>
        
    </div>
    
  </div>
    
  
  <!-- Footer -->
  
  <footer class="row">
    <div class="large-12 columns">
      <hr />
      <div class="row">
        <div class="large-6 columns">
        </div>
        <div class="large-6 columns">
        </div>
      </div>
    </div> 
  </footer>
  
<!--	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script> -->
</body>
</html>