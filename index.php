<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Share your bandit and hero spottings</title>
<meta name="author" content="Mikko Savinainen">

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

</head>


<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">DayZ hero or bandit?</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Main</a></li>
					<li><a href="addNew.php">Add new</a></li>
					<li><a href="all.php">Show all</a></li>
					<li><a href="settings.php">Settings</a></li>
					<li><a href="findJSON.php">Find JSON</a></li>
					<li><a href="listSpottingsJSON.php">Show all JSON</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
		<?php
		if (isset($_COOKIE["saveName"])) {
			print("<p>Welcome " . $_COOKIE["saveName"] . "</p>");
		} else {
			print("<p>Welcome Unknown Internet Warrior</p>");
		}
		
	?>

	<div class="jumbotron">
		<div class="container">
			<h2>Hello survivor</h2>
			<p>DayZ is a multiplayer open world survival horror video game in
				development by Bohemia Interactive and the stand-alone version of
				the award-winning mod of the same name. The game was test-released
				on December 16, 2013, for Microsoft Windows via digital distribution
				platform Steam, and is currently in early alpha testing.</p>
			<p>The game places the player in the fictional 225km2 post-Soviet
				state of Chernarus, where an unknown virus has turned most of the
				population into violent zombies. As a survivor, the player must
				scavenge the world for food, water, weapons, and medicine, while
				killing or avoiding zombies, and killing, avoiding or co-opting
				other players in an effort to survive the zombie apocalypse.</p>
			<p>
				<a class="btn btn-primary btn-lg"
					href="http://en.wikipedia.org/wiki/DayZ_(video_game)" role="button">Learn
					more &raquo;</a>
			</p>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>