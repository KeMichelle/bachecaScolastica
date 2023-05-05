<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./style/bacheca.css" />

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


  
    <!--section 1-->
    <div class="section1">
      
    <?php
    session_start();
   

    if(isset($_SESSION['username'])==false){
      echo("Devi fare il login!");
      echo "<button onclick=\"location.href='failogin.php'\">Vai al login</button>";
    }
    else{
      $pag = '<div class="content1">
      <img class="imgAnteprima" src="./img/imgoval.png" />
      <div class="boxdesc">
        <div class="titleSection1">Pubblica qualcosa!</div>
        <p class="descrizioneSection1">
          Questa bacheca é stata creata per tutte le persone in bisogno di una
          mano per migliorare il proprio stile di vita. Guarda i post, o
          pubblica!
        </p>
      </div>
    </div>
  </div>

  <div class="spacer">
      <div class="boxSpacer">
        <h1 class="titoloSpacer">Post Recenti</h1>
        <p class="descSpacer">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud.
        </p>
      </div>
    </div>
';
echo $pag;

      $connessione = "mysql:host=localhost;dbname=utenti;port=3306";

      try{
        $pdo = new PDO($connessione, 'icib_admin', '0987654321');
        $sql='SELECT titolo,contenuto,id_utente FROM post';
        $stm = $pdo->prepare($sql);
        $stm -> execute();
        
        //prendi tutto dal database
        $ris = $stm->fetchAll(PDO::FETCH_ASSOC);

        //si capisce
        foreach($ris as $post){
          ?>
          <div class="body-b">
          <div class="postbox">
          <div class="utente"><?php echo $post['id_utente']; ?> </div>
          <h2 class="titolo-box"><?php echo $post['titolo']; ?></h2>
          <div class="contenuto">
            <p><?php echo $post['contenuto']; ?></p>
            <p><a href="#">Leggi di più &raquo;</a></p>
          </div>
        </div>  
        <?php
              
        }
      }
      catch(PDOException $errore){
        echo $errore;
      }
    }
    ?>

    <script src="./scripts/getStarted.js"></script>
  </body>
</html>