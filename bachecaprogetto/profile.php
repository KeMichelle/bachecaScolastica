<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./style/profilo.css" />

    <title>Bacheca - Profilo</title>
  </head>
  <body>
    <!--Header-->
    <header class="header">
      <div class="titleBacheca">Bacheca</div>
      <div class="sections">
        <nav>
          <ul>
            <li><a href="bacheca.php">Blog</a></li>
            <li><a href="post.php">Post</a></li>
            <li><a href="#">About</a></li>
            <li><a href="profile.php">Profilo</a></li>
          </ul>
        </nav>
      </div>
    </header>


    <?php
    session_start();
    if(isset($_SESSION['username'])==false){
      echo("Devi fare il login!");
      echo "<button onclick=\"location.href='failogin.php'\">Vai al login</button>";
    }
    else{
        echo '<div class="usernameframe">';
        echo '<div class="username">';
        echo $_SESSION['username'] . '</div>';
        echo '</div>';
    }
    ?>
   
  </body>
</html>