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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST))
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bazaint";

	// Create connection

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection

	if ($conn->connect_error)
		{
		die("Connection failed: " . $conn->connect_error);
		}

	$ciekawostka = $_POST['ciekawostka'];
	$id = 1;
	if (empty($ciekawostka))
		{
		echo '<p>Wypełnij wszystkie dane.</p>';
		}
	  else
		{
		$sql = "INSERT INTO posts (text_post, author_post) VALUES ('" . $ciekawostka . "', '" . $id . "')";
		if ($conn->query($sql) === TRUE)
			{
			echo "Poprawnie dodano ciekawostkę.";
			}
		  else
			{
			echo "Error: " . $sql . "<br />" . $conn->error;
			}

		$conn->close();
		}
	}

?>
 </section>
</body>
</html>

