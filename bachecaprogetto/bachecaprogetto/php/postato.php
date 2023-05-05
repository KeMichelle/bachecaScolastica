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
            <li><a href="bacheca.php">Blog</a></li>
            <li><a href="post.php">Post</a></li>
            <li><a href="#">About</a></li>
            <li><a href="profile.php">Profilo</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="boxcontainer">
    <?php
    session_start();

    //connessione al database con SQL
    $servername= "localhost";
    $username = "root";
    $password = "";
    $dbname = "bacheca";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connessione fallita: " . $conn->connect_error);
    }
    
    //prendi il submit dal form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $utente = $_SESSION['id_utente'];
        $titolo = $_POST["titolo"];
        $commento = $_POST["commento"];


// Inserisci i dati dentro il database
      $stmt = $conn->prepare("INSERT INTO post (titolo, contenuto, time, utente) VALUES(?, ?, NOW(), ?)");
      $stmt->bind_param("sss", $titolo, $commento, $utente);
      $stmt->execute();

      if($stmt-> affected_rows > 0){
        echo "Postato!";
        echo "<button class='bottone' onclick=\"location.href='../bacheca.php'\">Torna sulla bacheca</button>";
    }
    else{
        echo "Post fallito.";
    }

   }
   else{
    echo "Errore non è post.";
   }

    ?>
    </div>

</body>
</html>