<!DOCTYPE html>

<html>

<head>
	
  <title>Artefacts</title>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Vollkorn">
    
    <style>
        body {
        font-family: 'Vollkorn', serif;
        }
    </style>

</head>

<body>
	
	<div class="navbar">
         	<ul>
            		<li><a href="index.html">Home</a></li>
            		<li><a href="team.html">About the Team</a></li>
            		<li><a href="artefacts.html">Show all Artefacts</a></li>
         	</ul>
    	</div>	
	
	<div class="headerbreak"></div>
	
	<div class="title">
		<h2>SHOW ALL ARTEFACTS</h2>
	</div>
		
	<div id="imagelist">
	<?php

		$link = mysql_connect('localhost','olivia','t9Hpp02?')
			or die('Could not connect: '.mysql.error());
		// echo 'Connected successfully';
		mysql_select_db('du_arch') or die('Could not select database');

		// Peforming SQL query
		$query = 'SELECT * FROM artefact';
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());

		// Printing results in HTML


		if($result){

			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				//echo "\t<br />\n";

				//echo " ".$line[Site]." ".$line[uuid]." ";
				$pano = glob('../olivia/Sites/'.$line[Site]."/".$line[uuid]."/*.*");
				echo '<a class="fancybox" rel="group" href="' . $pano[0] . '"><img src="' . $pano[0] .'" alt="random image" style="width:304px;height:228px"></a>';
			}

		}


		// Free resultset
		mysql_free_result($result);


		// Closing Connection
		mysql_close($link);

	?>
	</div>
                                 
        <div class="footer">
        <p>All Rights Reserved</p>
    </div>
	
<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="source/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

	
</body>

</html>
