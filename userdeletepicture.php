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
    if (empty($_COOKIE['islogged'])) {
        header('Refresh: 5; url=login.php');
        return '<p>Czas sesji wygasł. Proszę zalogować się ponownie.</p><p> Za chwilę nastąpi przekierowanie</p>';
   }

   if (isset($_SESSION['nick'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bazaint";
        $author = $_SESSION['iduser'];


      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

      $sqlpic = "SELECT `pictures`.*, `user`.*
      FROM `pictures`
      LEFT JOIN `user` ON `pictures`.`author_picture` = `user`.`id_user` 
      WHERE author_picture = $author";
      $resultpic = $conn->query($sqlpic);

      if ($resultpic->num_rows > 0) {
          echo "<table border><tr><th>ID AUTORA</th><th>AUTOR</th><th>OBRAZEK</th><th>USUŃ</th></tr>";
          // output data of each row
          while($row = $resultpic->fetch_assoc()) {
              echo "<tr>
              <td>".$row["id_picture"]."</td>
              <td>".$row["login"]."</td>
              <td><img src='".$row["picture_url"]."'></td>
              <td> <a href = deletepicture.php?picture_to_delete=$row[id_picture] > Delete </a></td></tr>";
          }
          echo "</table>";
      } else {
          echo "0 OBRAZKÓW";
      }
      $conn->close();
         }
     else {
       echo '<p>Nie jesteś zalogowany. Przejdź do <a id="database" href="login.php">Formularza logowania</a>.</p>';
   }
         
 ?>
 </section>
</body>
</html>
<?php
ob_end_flush();
?>
