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
  <form action="register.php" method="POST" id="register-form">
      <fieldset>
	    <dl>
		 <dt><label for="nick">Nick:</label></dt>
		  <dd><input type="text" name="login" id="nick" placeholder="jankowalski"></dd>
		 <dt><label for="password">Hasło:</label></dt>
		  <dd><input type="password" name="password" id="password" placeholer="password"></dd>
		 <dt><label for="email">E-mail:</label></dt>
		  <dd><input type="text" name="email" placeholder="jankowalski@domena.pl" id="email"></dd>
		 <dt><input type="submit" name="check" value="Rejestruj"></dt>
		</dl>
	  </fieldset>
    </form>
 </section>
</body>
</html>

