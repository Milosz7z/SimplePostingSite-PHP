<?php

	$polaczenie = new mysqli('localhost','root','','bazaint');

	if(mysqli_connect_errno() !=0)
	{
		echo mysqli_connect_error();
		exit;
	}
	
	$id_us =  $_GET['user_to_delete'];

	$sqlus = "DELETE FROM user WHERE id_user='$id_us'";
	$wynikus = $polaczenie->query($sqlus);

	$sqlpo = "DELETE FROM posts WHERE author_post='$id_us'";
	$wynikpo = $polaczenie->query($sqlpo);

	$sqlpic = "DELETE FROM pictures WHERE author_picture='$id_us'";
	$wynikpic = $polaczenie->query($sqlpic);


	if($wynik==false)
	{
		echo"error";
	}

	echo "<h1>Usuwanie z bazy danych</h1>";

	header("Location: adminpanel.php"); 

?>

