<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/completato.css" />
<title>Bacheca</title>
</head>


<body>
    <!--Header-->
    <header class="header">
      <div class="titleBacheca">Bacheca</div>
      <div class="sections">
        <nav>
          <ul>
            <li><a href="../bacheca.php">Blog</a></li>
            <li><a href="../post.php">Post</a></li>
            <li><a href="#">About</a></li>
            <li><a href="../profile.php">Profilo</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="boxcontainer">
   
    <?php
    session_start();
    
    //connessione al database con SQL
    $conn = new PDO("mysql:host=localhost;dbname=utenti", "icib_admin", "0987654321");

    if(isset($_SESSION['username']) && $_SESSION['username'] == 'MichelleAdmin'){
        if(isset($_POST['delete'])) {
            $id_utente = $_POST['id_utente'];
        
            // elimina l'utente dal database
            $sql = "DELETE FROM utenti WHERE id_utente = :id_utente";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_utente', $id_utente, PDO::PARAM_INT);
            $stmt->execute();
        
            // controlla se e' eliminato
            if($stmt->rowCount() > 0) {
              $success_msg = "Utente eliminato!";
            } else {
              $error_msg = "Errore.";
            }
          }
    }
    else{
        echo("Non sei admin.");
        echo "<button onclick=\"location.href='failogin.php'\">Vai al login</button>";
    }
    
    ?>
    </div>

</body>
</html>
