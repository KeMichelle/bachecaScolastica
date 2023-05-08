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
    // Connessione al database
    $conn = new PDO("mysql:host=localhost;dbname=bacheca", "root", "");

    $id_utente = $_SESSION['id_utente'];
    $titolo = $_POST['titolo'];
    $contenuto = $_POST['contenuto'];

    // Update il post nel database
    $stmt = $conn->prepare("UPDATE post SET titolo = :titolo, contenuto = :contenuto WHERE id_utente = :id_utente");
    $stmt->bindParam(':titolo', $titolo);
    $stmt->bindParam(':contenuto', $contenuto);
    $stmt->bindParam(':id_utente', $id_utente);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      echo "<p>Editato!</p>";
      echo "<button class='bottone' onclick=\"location.href='../bacheca.php'\">Torna sulla bacheca</button>";
}
    else{
      echo "<p>Errore. " . $stmt->errorInfo()[2] . "</p>" ;
      echo "<button class='bottone' onclick=\"location.href='../bacheca.php'\">Torna sulla bacheca</button>";
}

?>
</div>

</body>
</html>