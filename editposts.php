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
        return '<p>Czas sesji wygasł. Proszę zalogować się ponownie.</p><p> Za chwilę nastąpi przepierowanie</p>';
   }

   if (isset($_SESSION['nick'])  && (isset($_SESSION['userlogin'])) && ($_SESSION['admin'] == true)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bazaint";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT `posts`.*, `user`.*
        FROM `posts`
        LEFT JOIN `user` ON `posts`.`author_post` = `user`.`id_user`  ";
        $result = $conn->query($sql);
             


          if ($result->num_rows > 0) {
            echo "<table border><tr><th>ID POSTA</th><th>TEKST</th><th>AUTOR</th><th>USUŃ</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row["id_post"]."</td>
                <td>".$row["text_post"]."</td>
                <td>".$row["login"]."</td>
                <td> <a href = deletepost.php?post_to_delete=$row[id_post] > Delete </a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 POSTÓW";
        }

        $conn->close();
   } else {
       echo '<p>Nie jesteś zalogowany albo nie jesteś adminem. Przejdź do <a id="database" href="login.php">Formularza logowania</a>.</p>';
   }


?>
 </section>
</body>
</html>
<?php
ob_end_flush();
?>