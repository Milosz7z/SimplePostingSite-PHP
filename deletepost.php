<?php

	$polaczenie = new mysqli('localhost','root','','bazaint');

	if(mysqli_connect_errno() !=0)
	{
		echo mysqli_connect_error();
		exit;
	}
	$id_post =  $_GET['post_to_delete'];

	$sql = "DELETE FROM posts WHERE id_post='$id_post'";
	$wynik = $polaczenie->query($sql);


	if($wynik==false)
	{
		echo"BŁĄD";
	}

	echo "<h1>Usuwanie z bazy danych</h1>";

	header("Location: adminpanel.php"); 

?>

