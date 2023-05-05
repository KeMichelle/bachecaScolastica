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

    <div class="boxgrid">
    <div class="formgrid">
    <form action="../bachecaprogetto/php/postato.php" method="post">
      
      <label for="title">Title:</label>
      <input type="text" id="titolo" name="titolo" required>
      <br><br>
      <label for="commento"></label>
      <textarea id="commento" name="commento" rows="5" cols="40" required></textarea>
      <br><br>
      <div class="iconsbox">
      <button type="button" id="gobackbtn">
            <img src="img/arrowGoBack.svg" alt="go back">
        </button>
      <button type="submit">
        <img src="img/tick.svg" alt="Submit">
        </button>
        
      </div>
    </form>
    </div>
    </div>
   

    <script src="./scripts/goBack.js"></script>
  </body>
</html>