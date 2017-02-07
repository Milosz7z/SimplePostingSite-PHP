<?php
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
        $login    = $_POST['login'];
	    $password = $_POST['password'];
		 
	    if (empty($login) || empty($password)) {
		  echo '<p>Wypełnij wszystkie dane.</p>';
		} else {
		    if (file_exists('config.php')) {
                include_once('config.php');
		    } else {
		        return 'config.php file not found.';
		    }
		
            $mysqli = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);
	
		    if ($mysqli -> connect_error) {
                return '<p>Problem z połączeniem się z bazą danych:' . $mysqli->connect_error . '[' . $mysqli->connect_errno . ']</p>';
            } else {
                $login     = trim(strip_tags($mysqli -> real_escape_string($login)));
                $password  = hash('sha256', trim(strip_tags($mysqli -> real_escape_string($password))));

                $result = $mysqli -> query("SELECT login, id_user, admin FROM `user` WHERE login = '$login' and password = '$password'");
                if ($result -> num_rows == 1) {
                    $row = $result -> fetch_row();
                    $username = $row[0];
                    $iduser = $row[1];
                    $admin = $row[2];
                    $_SESSION['userlogin'] = $username;
                    $_SESSION['iduser'] = $iduser;
                    $_SESSION['admin'] = $admin;
                    $_SESSION['nick'] = $row[0];

                    setcookie('islogged', 'islogged', time() + 3600); // 1h

                    header('Location: userpanel.php');
                    
                } else {
                    echo '<p>Brak podanego użytkownika w bazie.</p>';
                }
            }
		}
    }
  ?>
 </section>
</body>
</html>
<?php
ob_end_flush();
?>
