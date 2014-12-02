<?php
//Tutkitaan, onko lukittuna olevaa keksiä
if (isset($_COOKIE["saveName"])) {
	
}
//Onko painettu save-nimistä painiketta
if (isset($_POST["save"])) {
	$givenName = $_POST["name"];
		setcookie("saveName", $givenName,time() + 60*60*24*7); // vikko time() + 60*60*24*7);
		//Siirrytään etusivulle
		header("location: index.php?name=$givenName");
		exit;
}
?>
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
				<a class="navbar-brand" href="#">DayZ hero or bandit?</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="index.php">Main</a></li>
					<li><a href="addNew.php">Add new</a></li>
					<li><a href="all.php">Show all</a></li>
					<li class="active"><a href="#">Settings</a></li>
					<li><a href="find.php">Find</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron">
		<div class="container">
			<form action="settings.php" method="post">
				<div class="form-group">
					<label>Name:</label> <input type="text" class="form-control"
						name="name" placeholder="John Doe" value="">
						<input type="submit" name="save" value="Save" />
				</div>

			</form>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>