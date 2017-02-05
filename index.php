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
   <li><a href="adminpanel.php" title="Plik dla zalogowanych użytkowników">Panel administratora</a></li>
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

$sqlpost = "SELECT `posts`.`id_post`, `posts`.`text_post`, `posts`.`author_post`, `user`.`id_user`, `user`.*, `posts`.*
FROM `posts`
LEFT JOIN `user` ON `posts`.`author_post` = `user`.`id_user` ";
$resultpost = $conn->query($sqlpost);

if ($resultpost->num_rows > 0) {
    echo "<table border><tr><th>Autor</th><th>Ciekawostka</th></tr>";
    // output data of each row
    while($row = $resultpost->fetch_assoc()) {
        echo "<tr><td>".$row["login"]."</td><td>".$row["text_post"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

echo "<br>";
$sqlpic = "SELECT `pictures`.*, `user`.*
FROM `pictures`
LEFT JOIN `user` ON `pictures`.`author_picture` = `user`.`id_user` ";
$resultpic = $conn->query($sqlpic);

if ($resultpic->num_rows > 0) {
    echo "<table border><tr><th>Autor</th><th>Obrazek</th></tr>";
    // output data of each row
    while($row = $resultpic->fetch_assoc()) {
        echo "<tr><td>".$row["login"]."</td><td><img src='".$row["picture_url"]."'></a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
 </section>
</body>
</html>

