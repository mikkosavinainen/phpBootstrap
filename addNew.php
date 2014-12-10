<?php
require_once 'new.php';

session_start ();

if (isset ( $_POST ["next"] )) {
	$new = new newSpotting ( $_POST ["name"], $_POST ["whereItHappend"], $_POST ["specialCharacteristics"], $_POST ["role"], $_POST ["language"], $_POST ["whatHappend"] );
	
	
	// print_r ( $new ); //debuginfo oliosta
	$_SESSION ["addingNew"] = $new;

	
	$nameError = $new->checkName ();
	$whereItHappendError = $new->checkWhereItHappend ();
	$specialCharacteristicsError = $new->checkSpecialCharacteristics ();
	$role = $new->checkRole ();
	$languageError = $new->checkLanguage ();
	$whatHappendError = $new->checkWhatHappend ();
	
	if ($nameError == 0 && $whereItHappendError == 0 && $specialCharacteristicsError == 0 && $whatHappendError == 0) {
		
		try {
			require_once 'newPDO.php';
			$databaseHandling = new newPDO();
			//$id = $databaseHandling->addSpotting($new);
			
			// Set id from session to add id
			$_SESSION["addingNew"]->setspottingId($id);
			
		} catch (Exception $e) {
			session_write_close();
			
			// Redirect to error page with error message
			header("location: error.php?page=" . urlencode("Adding") . "&error" . $e->getMessage() );
			exit();
		}
	
		session_write_close ();
		header("location: showAdded.php");
		exit ();
	}

	
	
} elseif (isset ( $_POST ["cancel"] )) {
	unset ( $_SESSION ["addingNew"] );
	header ( "location: index.php" );
	exit ();
} else {
	
	if (isset($_SESSION["addingNew"])) {
		$new = $_SESSION["addingNew"];
		
		$nameError = $new->checkName ();
		$whereItHappendError = $new->checkwhereItHappend ();
		$specialCharacteristicsError = $new->checkSpecialCharacteristics ();
		$role = $new->checkRole ();
		$languageError = $new->checkLanguage ();
		$whatHappendError = $new->checkWhatHappend ();
		
		
	} else {
		$new = new newSpotting ();
		$nameError = 0;
		$whereItHappendError = 0;
		$specialCharacteristicsError = 0;
		$role = 0;
		$languageError = 0;
		$whatHappendError = 0;
	}

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

<style>
.pun {
	color: red;
}
</style>

</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">DayZ hero or bandit?</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="index.php">Main</a></li>
					<li class="active"><a href="#">Add new</a></li>
					<li><a href="all.php">Show all</a></li>
					<li><a href="settings.php">Settings</a></li>
					<li><a href="find.php">Find</a></li>
				</ul>
			</div>
		</div>
	</nav>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>


	<div class="container">
		<h2>Encounter</h2>
		<form role="form" action="addNew.php" method="post">

			<div class="radio">
				<label><input type="radio" name="role"
					<?php if($new->getRole()=="hero")?> value="hero" checked="checked">Hero</label>
			</div>
			<div class="radio">
				<label><input type="radio" name="role"
					<?php if($new->getRole()=="bandit")?> value="bandit">Bandit</label>
			</div>

			<div class="form-group">
				<label>Where did you meet?</label> <span class="pun"><?php print ($new->getError($whereItHappendError));?></span>

				<input type="text" class="form-control" name="whereItHappend"
					placeholder="Elektrozavodsk"
					value="<?php print(htmlentities($new->getwhereItHappend(), ENT_QUOTES, "UTF-8"));?>">

			</div>
			<div class="form-group">
				<label>Special characteristics:</label> <span class="pun"><?php print ($new->getError($specialCharacteristicsError))?></span>
				<input type="text" class="form-control"
					name="specialCharacteristics"
					placeholder="Red pants, gas mask, shotgun"
					value="<?php print(htmlentities($new->getSpecialCharacteristics(), ENT_QUOTES, "UTF-8"));?>">

			</div>
			<div class="form-group">
				<label>Name of encountered player:</label> <span class="pun"><?php print($new->getError($nameError));?></span>
				<input type="text" class="form-control" name="name"
					placeholder="//xXx\\AlexSch10"
					value="<?php print(htmlentities($new->getName(), ENT_QUOTES, "UTF-8"));?>">

			</div>
			<div class="form-group">
				<label>Language</label> <span class="pun"><?php print($new->getError($languageError))?></span>
				<input type="text" class="form-control" name="language"
					placeholder="ENG / FI / SWEDISH etc."
					value="<?php print(htmlentities($new->getLanguage(), ENT_QUOTES, "UTF-8"));?>">

			</div>
			<div class="form-group">
				<label for="comment">What happend:</label> <span class="pun"><?php print ($new->getError($whatHappendError))?></span>
				<textarea class="form-control" rows="5" id="comment"
					name="whatHappend"
					placeholder="Try to give clear picture what happend"><?php print(htmlentities($new->getWhatHappend(), ENT_QUOTES, "UTF-8"));?></textarea>

			</div>



			<button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
			<button type="submit" name="next" class="btn btn-success">Next</button>

		</form>
	</div>

</body>
</html>
