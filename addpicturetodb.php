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
   <li><a href="form.php" title="Formularz rejestracji">Formularz rejestracji</a></li>
   <li><a href="login.php" title="Formularz logowania">Formularz logowania</a></li>
   <li><a href="userpanel.php" title="Plik dla zalogowanych użytkowników">Panel użytkownika</a></li>
   <li><a href="adminpanel.php" title="Plik dla zalogowanych użytkowników">Panel administratora</a></li>
  </ul>
 </nav>

 <section id="main">
    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST))
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bazaint";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error)
		{
		die("Connection failed: " . $conn->connect_error);
		}

	$obrazek = $_POST['obrazek'];
	$author = $_SESSION['iduser'];
	if (empty($obrazek))
		{
		echo '<p>Wypełnij wszystkie dane.</p>';
		}
	  else
		{
		$sql = "INSERT INTO pictures (picture_url, author_picture) VALUES ('" . $obrazek . "', '" . $author . "')";
		if ($conn->query($sql) === TRUE)
			{
			echo "Obrazek został poprawnie dodany.";
			}
		  else
			{
			echo "Błąd: " . $sql . "<br />" . $conn->error;
			}

		$conn->close();
		}
	}

?>
 </section>
</body>
</html>
<?php
ob_end_flush();
?>