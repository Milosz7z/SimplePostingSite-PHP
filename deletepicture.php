<?php

	$polaczenie = new mysqli('localhost','root','','bazaint');

	if(mysqli_connect_errno() !=0)
	{
		echo mysqli_connect_error();
		exit;
	}
	$id_picture =  $_GET['picture_to_delete'];

	$sql = "DELETE FROM pictures WHERE id_picture='$id_picture'";
	$wynik = $polaczenie->query($sql);


	if($wynik==false)
	{
		echo"Błąd";
	}

	echo "<h1>Usuwanie z bazy danych</h1>";

	header("Location: adminpanel.php"); 

?>

