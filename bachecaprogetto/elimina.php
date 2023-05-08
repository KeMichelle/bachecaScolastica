<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/completato.css" />

    <title>Bacheca</title>
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

    $connessione = "mysql:host=localhost;dbname=utenti;port=3306";
    $pdo = new PDO($connessione, 'icib_admin', '0987654321');

    //l'id utente
    $current_id = $_SESSION['id_utente'];

    $sql="SELECT id_post,titolo,contenuto,id_utente FROM post WHERE id_utente = :current_id";
    $stm = $pdo->prepare($sql);

    //prende l'id e lo esegue
    $stm->execute(array(':current_id' => $current_id));
    ?>

    <div class="boxcontainer">
      <p>Sicuro di voler eliminare il post?</p>
      <form action="php/eliminato.php" method="POST">
      <input type="hidden" name="id_post" value="<?php echo $post['id_post']; ?>">
        <button type="submit" name="conferma" value="si"> Si </button>
        <button type="button" id="gobackbtn" class="gobackbtn">No </button>
             
      </form>
    </div>
    <script src="scripts/goBack.js"></script>
     
  </body>
</html>
