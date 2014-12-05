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

<script type="text/javascript">

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange=function() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       listSpottings(xmlhttp.responseText);
    }
}

xmlhttp.open("GET", "spottingsJSON.php", true);


xmlhttp.send();

function listSpottings(response) {
    var resp = JSON.parse(response);
    var i;
    var text = "";
	console.log(JSON.stringify(resp));
    
    for(i = 0; i < resp.length; i++) {
        text = text + "<p>Name: " + resp[i].name +
        "<br>Where: " + resp[i].whereItHappend +
        "<br>Special characteristics: " + resp[i].specialCharacteristics +
        "<br>role: " + resp[i].role +
        "<br>language: " + resp[i].language +
        "<br>what happend: " + resp[i].whatHappend + "</p>";
    }

    // Laitetaan taulukon kÃ¤sittelyn tuloksena tullut teksti HTML-elementtiin
    document.getElementById("list").innerHTML = text;
}
</script>

</head>


<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">DayZ hero or bandit?</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">listSpottings.php</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron">
		<div class="container">
			<h1>Coming soon</h1>
			<p>Other assignment</p>

		</div>
	</div>
	
	<!-- just testing -->
	<article>
		<h2>All Spottings</h2>

		<div id="list"></div>
		<p>
			<a href="index.php">Takaisin</a>
		</p>

	</article>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>