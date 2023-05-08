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
    //connessione al database con SQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bacheca";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connessione fallita: " . $conn->connect_error);
    }

    session_start();
    if(isset($_SESSION['registrato'])){
      die("Errore: utente già registrato");
    }

    //prendiamo i dati dal form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];

    //validiamo i dati dal form
    if(empty($username) || empty($password) || empty($nome) || empty($cognome) || empty($email)) {
        die("Errore: mancano delle informazioni.");
    }

    //facciamo l'hash della password
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    //inseriamo i dati nel database
    $stmt = $conn->prepare("INSERT INTO utenti_info (username, password, nome, cognome, email) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password_hashed, $nome, $cognome, $email);
    $stmt->execute();

    if($stmt-> affected_rows > 0){
        echo "Registrazione completata!";
        echo "<button onclick=\"location.href='../failogin.php'\">Vai al login</button>";
        $_SESSION['registrato']='registrato';
    }
    else{
        echo "Errore.";
    }

    $stmt->close();
    $conn->close();
    ?>
    </div>

  <script src="./scripts/getStarted.js"></script>
</body>
</html>