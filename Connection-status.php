<?php
	require_once("config.php");
	$connection = new mysqli($servername, $username, $password, $dbname);
	if( $connection -> connect_error)
		echo 'fail';
	else{		
		print('Ok!');
		$connection -> close();	
	}
?>