<?php
try {
	require_once "newPDO.php";
	$databaseHandling = new newPDO ();
	
	if (isset ( $_GET ["get"] )) {
		$target = file_get_contents("php://input"); //json_decode ( $GLOBALS ["HTTP_RAW_POST_DATA"]); //
		$result = $databaseHandling->getAll ( $target->name );
		print (json_encode ( $result )) ;
		print($target);
		
	} else {
		$result = $databaseHandling->allSpottings ();
		print json_encode ( $result );
	}
} catch ( Exception $e ) {
	print ($e->getMessage ()) ;
}

?>