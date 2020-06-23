<?php
 
  session_start();

  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

   
    <header>
       <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/logo.png" alt="">
        </a>
        <ul>

          <li><a href="index.php">Home</a></li>
          <li><a href="#">About</a></li> <!-- Informações sobre o projeto e do que se trata -->
          <li><a href="#">Light/Dark</a></li> <!--Funcionalidade que muda a cor do site para preto -->
          <li><a href="#">Updates</a></li> <!-- Serão postados os updates -->
        </ul>
      </nav>
      <div class="header-login">
     
       <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </header>



   
   
