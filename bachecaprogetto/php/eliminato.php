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

    $id_utente = $_SESSION['id_utente'];
    $id_post = $_POST['id_post'];
    
        
        //query per eliminare il post
        $stmt = $conn->prepare("DELETE FROM post WHERE id_post = :id_post AND id_utente = :id_utente");
        $stmt->bindParam(':id_utente', $id_utente, PDO::PARAM_INT);
        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $stmt->execute();
     
    
        if($stmt->rowCount() > 0){
            echo "Post eliminato!";
            echo "<button class='bottone' onclick=\"location.href='../bacheca.php'\">Torna sulla bacheca</button>";
        }
        else{
            echo "<p>Eliminazione fallita. " . $stmt->errorInfo()[2] . "</p>" ;
            echo "<button class='bottone' onclick=\"location.href='../bacheca.php'\">Torna sulla bacheca</button>";
        }
    
    ?>
    
    </div>

</body>
</html>
