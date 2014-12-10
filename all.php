<?php
require_once 'new.php';

session_start ();

if (isset ( $_POST ["delete"] )) {
	$id = $_POST ["id"];
	setcookie ( "id", $id, time () + 60 * 60 * 24 * 7 );
	
		//require_once 'newPDO.php';
		//$sqlHandling = new newPDO ();
	$dbkyrpa = new PDO("mysql:host=localhost;dbname=spottings", "root", "salainen");
	$sql = "DELETE FROM spotting WHERE spotting_id=" . $id;
	$dbkyrpa->exec($sql);
	
	$perse = "seppo";
// 	} catch ( Exception $e ) {
// 		$errori = $e->getMessage();
// 		setcookie("errori", $errori, time () + 60 * 60);
// 		header ( "location: error.php?page=listing&error=" . $e->getMessage () );
// 		exit ();
// 	}
	
	header ( "location: all.php" );
} elseif (isset ( $_POST ["showMore"] )) {
	$id = $_POST ["id"];
	setcookie ( "id", $id, time () + 60 * 60 * 24 * 7 );
	header ( "location: showMore.php?id=$id" );
} else {
	$perse = "";
	$sql = "de nada";
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
					<li class="active"><a href="#">Show all</a></li>
					<li><a href="settings.php">Settings</a></li>
					<li><a href="find.php">Find</a></li>
				</ul>
			</div>
		</div>
	</nav>

	
			<?php
			if (isset ( $_COOKIE ["id"] )) {
				print ("<p>Welcome " . $_COOKIE ["id"] . "</p>") ;
				$deleteId = $_COOKIE ["id"];
				print ("<p>delete id " . $deleteId . " Perse " . $perse . "</p>") ;
			} else {
				print ("<p>Welcome Unknown Internet Warrior</p>") ;
			}
			
			?>
	
	
	<div class="jumbotron">
		<div class="container">
			<h1>Hero and bandit spottings</h1>
			<?php
			try {
				require_once 'newPDO.php';
				
				$sqlHandling = new newPDO ();
				$rows = $sqlHandling->allSpottings ();
				$length = count ( $rows );
				foreach ( $rows as $spotting ) {
					$selectId = $spotting->getspottingId ();
					print ("<form action='' method='post'> <input type='hidden' name='id' value='$selectId'><p>What Happend: " . $spotting->getWhatHappend ()) ;
					print ("<br>Where: " . $spotting->getwhereItHappend ()) ;
					print ("<button type='submit' name='delete' class='btn btn-danger'>Delete</button>") ;
					print ("<button type='submit' name='showMore' class='btn btn-success'>Show more</button>" . "</p>\n </form>") ;
					
					// print ("<p>Name: " . $spotting->getName());
					// print ("<br>Role: " . $spotting->getRole());
					// print ("<br>Special Charasteristics: " . $spotting->getSpecialCharacteristics());
					// print ("<br>Language: " . $spotting->getLanguage() . "</p>\n");
				}
			} catch ( Exception $e ) {
				header ( "location: error.php?page=listing&error=" . $e->getMessage () );
				exit ();
			}
			?>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>