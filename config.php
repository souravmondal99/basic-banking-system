<?php

	$servername = "ec2-52-72-125-94.compute-1.amazonaws.com";
	$username = "rndccekxmfdvia";
	$password = "048eb31df24c4d54155da59d56fc12f131f515e67fb69d189de40f90fad80395";
	$dbname = "dbmf5rds68qv0d";

	$conn = pg_connect("host=$servername user=$username password=$password dbname=$dbname");

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".pg_errormessage($conn));
	}

?>
