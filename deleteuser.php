<?php

	$polaczenie = new mysqli('localhost','root','','bazaint');

	if(mysqli_connect_errno() !=0)
	{
		echo mysqli_connect_error();
		exit;
	}
	$id_posta =  $_GET['user_to_delete'];

	$sql = "DELETE FROM user WHERE id_user='$id_user'";
	$wynik = $polaczenie->query($sql);


	if($wynik==false)
	{
		echo"error";
	}

	echo "<h1>Usuwanie z bazy danych</h1>";

	header("Location: adminpanel.php"); 

?>

