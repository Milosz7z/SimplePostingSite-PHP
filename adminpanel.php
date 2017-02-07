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
       echo 'Jesteś zalogowany jako: ';
       echo $_SESSION['userlogin'];
       echo '<br><br>';
       echo '<a id="editusers" href="editusers.php">Edytuj użytkowników</a><br>';
       echo '<a id="editposts" href="editposts.php">Edytuj posty</a><br>';
       echo '<a id="editpictures" href="editpictures.php">Edytuj obrazki</a><br>';
       echo '<a id="database" href="logout.php">Wyloguj</a>';
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