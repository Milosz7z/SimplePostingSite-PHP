<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
 <head>
  <meta charset="UTF-8">
  <title>Podziel się informacją</title>
  <meta name="Author" content="Miłosz Synecki">
  <meta name="Description" content="Jeśli wiesz coś ciekawego możesz się tym podzielić." >
  <link rel="stylesheet" href="style.css">
 </head>
<body>
 <header>
  <h1><a href="index.php" title="System rejestracji i logowania">Podziel się informacją</a></h1>
 </header>
 <nav id="menu">
  <ul>
      <li><a href="addpost.php" title="Formularz dodawania ciekawostki">Dodaj ciekawostkę</a></li>
      <li><a href="addpicture.php" title="Formularz dodawania obrazka">Dodaj obrazek</a></li>
   <li><a href="form.php" title="Formualarz rejestracji">Formularz rejestracji</a></li>
   <li><a href="login.php" title="Formualarz logowania">Formularz logowania</a></li>
   <li><a href="userpanel.php" title="Plik dla zalogowanych użytkowników">Panel użytkownika</a></li>
  </ul>
 </nav>

 <section id="main">
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazaint";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `posts`.*, `user`.*
FROM `posts`
LEFT JOIN `user` ON `posts`.`author_post` = `user`.`id_user`  ";
$result = $conn->query($sql);
     
    if($result==false)
	{
		echo"error";
	}


	$counter=0;
	
	echo "<table border>";
	echo"<tr><th>ID</th><th>LOGIN</th><th>EMAIL</th><th>USUŃ</th></tr>";


	while(($rekord = $result -> fetch_assoc()) !=null) 
	{	
		echo '<tr><td>'.$rekord['id_user'];
		echo '<td>'.$rekord['login'];
		echo '<td>'.$rekord['email'];
		echo '<td> <a href = deleteuser.php?user_to_delete=$rekord[id_user] > Delete </a></td>';


	}
	echo '</table>';

$conn->close();
?>
 </section>
</body>
</html>
<?php
ob_end_flush();
?>