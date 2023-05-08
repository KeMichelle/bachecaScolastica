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

      $connessione = "mysql:host=localhost;dbname=bacheca;port=3306";

      try{
        $pdo = new PDO($connessione, 'root', '');

        //l'id utente
        $current_id = $_SESSION['id_utente'];

        //query dove prende l'id
        $sql="SELECT titolo,contenuto,id_utente FROM post WHERE id_utente = :current_id";
        $stm = $pdo->prepare($sql);

        //prende l'id e lo esegue
        $stm->execute(array(':current_id' => $current_id));
    
        //prendi tutto dal database
        $ris = $stm->fetchAll(PDO::FETCH_ASSOC);


        echo'<div class="body-b">';
        foreach($ris as $post){
        ?>
            <div class="postbox">
              <h2 class="titolo-box"><?php echo $post['titolo']; ?></h2>
              <div class="contenuto">
                <p><?php echo $post['contenuto']; ?></p>
              </div>
              <div class="post-icons">
              <button type="button" class="deletebtn">
                <img src="img/Delete.svg" alt="delete post">
              </button>
              <button type="button" class="editbtn">
                <img src="img/edit.svg" alt="edit post">
              </button>

              </div>
            </div>
          
    <?php
        }
        echo'</div>';
      }
      catch(PDOException $errore){
        echo $errore;
      }
    }
    ?>
    <script src="./scripts/editDeletee.js"></script>
  </body>
</html>
