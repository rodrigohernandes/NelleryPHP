<?php
$_SESSION ['username'] = "Admin";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nellery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
   <header>

    <?php

      require "includes/dbh.inc.php";

    ?>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="" alt=""> 
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Light/Dark</a></li>
          <li><a href="#">Updates</a></li>
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
    <main>
    <section class="gallery-links">
        <div class="wrapper">
          <h2>Gallery</h2>

          <div class="gallery-container">
            <?php
            include_once 'includes/dbh.php';

            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#">
                  <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
                  <h3>'.$row["titleGallery"].'</h3>
                  <p>'.$row["descGallery"].'</p>
                </a>';
              }
            }
            ?>
          </div>
         
          <?php
          if (isset($_SESSION['username'])) {
            echo '<div class="gallery-upload">
              <h2>Upload</h2>
              <form action="includes/gallery_upload.php" method="post" enctype="multipart/form-data">
                <input type="text" name="filename" placeholder="File name...">
                <input type="text" name="filetitle" placeholder="Image title...">
                <input type="text" name="filedesc" placeholder="Image description...">
                <input type="file" name="file">
                <button type="submit" name="submit">UPLOAD</button>
              </form>
            </div>';
          }
          ?>

      </section>

    </main>
    <div class="wrapper">
      <footer>



        </div>
      </section>
      </footer>
    </div>
  </body>
</html>
