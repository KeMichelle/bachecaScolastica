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
    $username = "icib_admin";
    $password = "0987654321";
    $dbname = "utenti";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connessione fallita: " . $conn->connect_error);
    }
    
    //prendi il submit dal form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $utente = $_POST['id_utente'];
        $titolo = $_POST["titolo"];
        $commento = $_POST["commento"];
        $time = date("Y-m-d H:i:s");

        $query = "SELECT id FROM utenti_info WHERE id_utente= $utente";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $id_utente = $row['id'];


        // Inserisci i dati dentro il database
        $sql = "INSERT INTO post (utente, titolo, contenuto, time) VALUES ('$id_utente', '$titolo', '$commento', NOW())";
        if (mysqli_query($conn, $sql)) {
            echo "Postato!";
            echo "<button class='bottone' onclick=\"location.href='../bacheca.php'\">Torna sulla bacheca</button>";
     }  else {
            echo "Errore: " . $sql . "<br>" . mysqli_error($conn);
     }
   }
}
    ?>
    </div>

</body>
</html>