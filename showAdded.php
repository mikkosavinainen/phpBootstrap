<?php
require_once "new.php";

session_start ();

// Tutkitaan, onko istunnossa elokuvaa
if (isset ( $_SESSION ["addingNew"] )) {
	// Otetaan istunnosta olio
	$new = $_SESSION ["addingNew"];
} else {
	// Tehdään tyhjä leffa
	$new = new newSpotting ();
}

if (isset ( $_POST ["submit"] )) {
	require_once 'newPDO.php';
	$databaseHandling = new newPDO();
	$id = $databaseHandling->addSpotting($new);
	unset ( $_SESSION ["addingNew"] );
	header ( "location: success.php" ); // Tässä vaiheessa pitäisi mennä tietokantaan
} elseif (isset ( $_POST ["cancel"] )) {
	unset ( $_SESSION ["addingNew"] );
	header ( "location: index.php" );
	exit ();
} elseif (isset ( $_POST ["change"] )) {
	header ( "location: addNew.php" );
} else {
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
					<li class="active"><a href="#">Confirmation</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron">
		<div class="container">
			<h2>Summary submitted by <?php
			if (isset ( $_COOKIE ["saveName"] )) {
				print ($_COOKIE ["saveName"]) ;
			} else {
				print ("Unknow Internet Warrior") ;
			}
			?></h2>
			<div class="container">
				<form role="form" action="showAdded.php" method="post">

					<div class="form-group">
						<label> Encounter Type </label>
					<?php if($new->getRole()=="hero") print("Hero")?>
					<?php if($new->getRole()=="bandit") print("Bandit")?>
			</div>

					<div class="form-group">
						<label>Where did you meet?</label>
				<?php print(htmlentities($new->getwhereItHappend(), ENT_QUOTES, "UTF-8"));?>

			</div>
					<div class="form-group">
						<label>Special characteristics:</label>
				<?php print(htmlentities($new->getSpecialCharacteristics(), ENT_QUOTES, "UTF-8"));?>

			</div>
					<div class="form-group">
						<label>Name of encountered player:</label>
				<?php print(htmlentities($new->getName(), ENT_QUOTES, "UTF-8"));?>
			</div>
					<div class="form-group">
						<label>Language</label>
				<?php print(htmlentities($new->getLanguage(), ENT_QUOTES, "UTF-8"));?>
			</div>
					<div class="form-group">
						<label>What happend:</label>
				<?php print(htmlentities($new->getWhatHappend(), ENT_QUOTES, "UTF-8"));?>
			</div>
					<p>
						<button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
						<button type="submit" name="change" class="btn btn-warning">Change</button>
						<button type="submit" name="submit" class="btn btn-success">Submit</button>
						<!-- Button trigger modal -->
						<!-- <button type="button" class="btn btn-success" data-toggle="modal"
							data-target="#myModal">Submit</button>-->
					</p>
				</form>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Success</h4>
					</div>
					<div class="modal-body">Encounter saved to database</div>
					<div class="modal-footer">
						<button type="submit" name="submit" class="btn btn-success">SUKKES</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>