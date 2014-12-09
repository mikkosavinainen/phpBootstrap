<?php
require_once 'new.php';

if (isset ( $_POST ["back"] )) {
	header ( "location: all.php" );
} elseif (isset ( $_POST ["delete"] )) {
	header ( "location: index.php" );
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
					<li class="active"><a href="#">Main</a></li>
					<li><a href="addNew.php">Add new</a></li>
					<li><a href="all.php">Show all</a></li>
					<li><a href="settings.php">Settings</a></li>
					<li><a href="find.php">Find</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
		<?php
		if (isset ( $_COOKIE ["id"] )) {
			print ("<p>Welcome " . $_COOKIE ["id"] . "</p>") ;
			$listId = $_COOKIE ["id"];
			print ("<p>listaus id " . $listId . "</p>") ;
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
				$rows = $sqlHandling->listById ( $listId );
				$length = count ( $rows );
				foreach ( $rows as $spotting ) {
					$selectId = $spotting->getspottingId ();
					print ("<form action='' method='post'> <input type='hidden' name='id' value='$selectId'><p>What Happend: " . $spotting->getWhatHappend ()) ;
					print ("<br>Where: " . $spotting->getwhereItHappend ()) ;
					print ("<p>Name: " . $spotting->getName());
					print ("<br>Role: " . $spotting->getRole());
					print ("<br>Special Charasteristics: " . $spotting->getSpecialCharacteristics());
					print ("<br>Language: " . $spotting->getLanguage());
					print ("<button type='submit' name='back' class='btn btn-success'>Back</button>" . "</p>\n </form>") ;
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