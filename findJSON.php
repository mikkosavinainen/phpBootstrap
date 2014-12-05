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
  function findName() {
    var json = {"name" : document.form.name.value };
	console.log("DEBUGGGGGGGGGGGGGGGGGGGG");
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       listSpottings(xmlhttp.responseText);
      }
    }
    
    xmlhttp.open("POST", "spottingsJSON.php?get=", true);
    xmlhttp.send(JSON.stringify(json));
  }

  function listSpottings(response) {
    var resp = JSON.parse(response);
    var i;
    var text = "";

    for(i = 0; i < resp.length; i++) {
        text = text + "<p>Name: " + resp[i].name +
        "<br>Where: " + resp[i].whereItHappend +
        "<br>Special characteristics: " + resp[i].specialCharacteristics +
        "<br>role: " + resp[i].role +
        "<br>language: " + resp[i].language +
        "<br>what happend: " + resp[i].whatHappend + "</p>";
    }

    // Laitetaan taulukon käsittelyn tuloksena tullut teksti HTML-elementtiin
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
					<li><a href="index.php">Main</a></li>
					<li><a href="addNew.php">Add new</a></li>
					<li><a href="all.php">Show all</a></li>
					<li><a href="settings.php">Settings</a></li>
					<li class="active"><a href="#">Find using JSON</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron">
		<div class="container">
			<h1>Coming soon</h1>
			<p>Other assignment</p>

		</div>
		
			<article>
		<h2>Hae leffa</h2>
		<form action="" method="post" name="form">
			<input type="text" id="name" name="name">
			<!-- onClick kertoo, että painikkeen painalluksen käsittelee haeNimella-funktio -->
			<input type="button" id="get" name="get" value="Hae"
				onClick="findName()">
		</form>
		<br>
		<div id="list"></div>
		<p>
			<a href="index.php">Takaisin</a>
		</p>
	</article>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>