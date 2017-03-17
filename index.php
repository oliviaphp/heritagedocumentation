<!DOCTYPE HTML>

<html>

<head>
	<meta charset="UTF-8">
    <title>Heritage Documentation and Protection</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Vollkorn">

    <style>
        body {
        font-family: 'Vollkorn', serif;
        }
    </style>
</head>

<body>

    <!--- Homepage -->
    <div id="home" class="content">
          <div class="main">
              <h2>Heritage Documentation and Protection</h2>

          </div>

        <div class="project">
            <h3>About the Project</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
    </div>
     <!--- End Homepage -->

     <!--- Team -->
    <div id="team" class="panel">
	    <div class="content">
		    <h2>About the Team</h2>


	    </div>
    </div>
    <!--- End Team -->

	<!-- Artifacts -->

	<div id="artifacts" class="panel">
		<div class="content">
			<h2>Show all Artifacts</h2>
			<div id="imagelist">
				<!-- Create the image array -->
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
						$pano = glob('../Sites/'.$line[Site]."/".$line[uuid]."/*.*");
						echo '<a button onclick=myFunction("'.$line[uuid].'")><img src="' . $pano[0] .'" style="width:304px;height:228px" alt="'. $line[uuid] .'"/></a>';
						echo "\r\n";
				 	}
				}

				// Free resultset
				mysql_free_result($result);

				// Closing Connection
				mysql_close($link);
				?>
			</div><!--imagelist-->

		</div><!--content-->
	</div><!--artifacts-->

	<div class="section-container">
<!-- Create the image related divs -->
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
				echo "<div id='".$line[uuid]."' class='page currentpage' style='z-index:499; left: 30%;'>\r\n";
				echo "<a button onclick=closeFunction('".$line[uuid]."')>[<u>Close</u>]</a>\r\n";
			    	echo "<h3 class='title'>Artifact Details</h3>\r\n";
				echo "<div class='detailslist'><ul>
					<li>Object Type: ".$line[ObjectType].", ".$line[ObjectSubType].", ".$line[ObjectPart]."</li>
					<li>Dimensions : ".$line[X]." x ".$line[Y]." x ".$line[Z]."</li>
					<li>Material: ".$line[Material].", ".$line[MaterialSbType]."</li>
					<li>Surface Texture: ".$line[SurfaceTexture]."</li>
					<li>Decoration: ".$line[Decoration].", ".$line[DecorationType]."</li>
					<li>Condition: ".$line[Condit]."</li>
					<li>Free Text: ".$line[FreeText]."</li>
					<li>Latitude: ".$line[Latitude]."</li>
					<li>Longitude: ".$line[Longitude]."</li>
					<li>hasParent: ".$line[hasParent]."</li>
					<li>Parent ID: ".$line[ParentID]."</li>
					<li>User ID: ".$line[UserID]."</li>
					<li>uuid: ".$line[uuid]."</li>
					<li>Site: ".$line[Site]."</li>";
				echo "</ul>
					<table class='table table-bordered'>
					<tr>
						<td class='success'>
							Looting Risk: ".$line[LootingRisk]."
						</td>
						<td class='success'>
							Vandalism Risk: ".$line[VandalismRisk]."
						</td>
						<td class='success'>
							Removal Risk: ".$line[RemovalRisk]."
						</td>
						<td class='success'>
							Damage Risk: ".$line[DamageRisk]."
						</td></tr></table>

					</div><!-- detailslist -->\r\n";
				echo "</div><!-- ".$line[uuid]." -->\r\n";
				//ObjectSubType,ObjectPart,X,Y,Z,Material,MaterialSbType,SurfaceTexture,Decoration,DecorationType,Condit,LootingRisk,VandalismRisk,RemovalRisk,DamageRisk,FreeText,Latitude,Longitude,hasParent,ParentID,UserID,uuid,Site
		 	}

		}

		// Free resultset
		mysql_free_result($result);

		// Closing Connection
		mysql_close($link);

		?>
	</div><!-- section container-->

<!-- JavaScript -->
<script>
	function myFunction(divID) {
	    var x = document.getElementById(divID);
	    var elements = document.getElementsByClassName("page currentpage"),
		n = elements.length;
		for (var i = 0; i < n; i++) {
			var e = elements[i];
			e.style.display = 'none';
		}
	    if (x.style.display === 'none') {
		x.style.display = 'block';
	    } else {
		x.style.display = 'none';
	    }
	}
	function closeFunction(divID) {
	    var x = document.getElementById(divID);
		x.style.display = 'none';
	}
</script>

	<!-- End Artifacts -->

    <!-- Header with Navigation -->
	<div id="header">
		<h1>HeDAP</h1>
		<ul id="navigation">
			<li><a id="link-home" href="#home">Home</a></li>
			<li><a id="link-team" href="#team">About the Team</a></li>
			<li><a id="link-artifacts" href="#artifacts">Show all Artifacts</a></li>
		</ul>
	</div>
</body>

</html>
