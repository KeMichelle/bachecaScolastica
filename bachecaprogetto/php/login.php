<!DOCTYPE html>
<html lang="en">
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
            <li><a href="../index.html">Blog</a></li>
            <li><a href="#">About</a></li>
            <li>
              <button id="getStartedbtn" class="getStartedbtn">
                Get Started
              </button>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="boxcontainer">
    <?php
    session_start(); 

    // conettiti al database
    $servername = "localhost";
    $username = "icib_admin";
    $password = "0987654321";
    $dbname = "utenti";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connessione fallita: " . $conn->connect_error);
    }


    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        die("Errore: devi mettere username e password.");
    }


    $stmt = $conn->prepare("SELECT password,id FROM utenti_info WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // username esiste, verifica la password
        $row = $result->fetch_assoc();
        $password_hashed = $row['password'];
    if (password_verify($password, $password_hashed)) {
        // password uguale, log in l'utente e mandalo sulla bacheca.
        $_SESSION['username'] = $username; // salva l'username nella sessione
        $_SESSION['id_utente'] = $row['id'];
        header("Location: ../bacheca.php"); // mandalo sulla pagina dela bacheca
  } else {
        // password incorretta
        echo "Errore: Password incorretta.";
        echo "<button onclick=\"location.href='../failogin.php'\">Vai al login</button>";
  }
} else {
        // username non trovato
        echo "Errore: non é stato trovato l'utente.";
        echo "<button onclick=\"location.href='../failogin.php'\">Vai al login</button>";
}
?>
  </div>

<script src="./scripts/getStarted.js"></script>
</body>
</html>