<?php
	$city = $_GET['city'];;
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}

	$url="http://build.uitdatabank.be/api/event/" .$id. "?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&format=json";
		
	$event = json_decode(file_get_contents($url));
	
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
      
      <h3><?php echo $event->event->eventdetails->eventdetail->title; ?> <small>in <?php echo($city) ?></small></h3>
      			<p><?php echo $event->event->eventdetails->eventdetail->shortdescription; ?></p>
			<?php 
			
			$images = $event->event->eventdetails->eventdetail->media->file; 
			foreach($images as $image)
			{
				if($image->mediatype == "photo")
				{
					echo "<img src='" . $image->hlink . "' />";	
				}
			}
			
			?>


            
    </div>
    
    
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 pull-9 columns">
        
      <ul class="side-nav">
        <li><a href="evenementen.php?city=<?php echo($city); ?>&category=0.14.0.0.0" >Concert</a></li>
        <li><a href="evenementen.php?city=<?php echo($city); ?>&category=Dansvoorstelling" >Dansvoorstelling</a></li>
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