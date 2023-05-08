<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/database.css" />
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
            <li><a href="database.php">DataBase</a></li>
            <li><a href="profile.php">Profilo</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="databasecontainer">
    <?php
    session_start();

    $conn = new PDO("mysql:host=localhost;dbname=utenti", "icib_admin", "0987654321");
    
    //controlla se sia admin.
    if(isset($_SESSION['username']) && $_SESSION['username'] == 'MichelleAdmin'){
        
        //prendi tutti i post
        $posts = $conn->query("SELECT * FROM post")->fetchAll(PDO::FETCH_ASSOC);

        //tutti gli utenti
        $users = $conn->query("SELECT * FROM utenti_info")->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        echo("Non sei admin.");
        echo "<button onclick=\"location.href='failogin.php'\">Vai al login</button>";
    }
    ?>

    <!-- tabella per eliminare i post -->
<h2>Manage Posts</h2>
<table>
  <thead>
    <tr>
      <th>Titolo</th>
      <th>Contenuto</th>
      <th>Postato da</th>
      <th>Quando</th>
      <th>Azioni</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($posts as $post): ?>
    <tr>
      <td><?php echo $post['titolo']; ?></td>
      <td><?php echo $post['contenuto']; ?></td>
      <td><?php echo $post['id_utente']; ?></td>
      <td><?php echo $post['time']; ?></td>
      <td>
        <form action="php/eliminatoAdmin.php" method="post">
          <input type="hidden" name="id_post" value="<?php echo $post['id_post']; ?>">
          <button type="submit" name="delete_post">Elimina</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Tabella per gestire gli utenti -->
<h2>Manage Users</h2>
<table>
  <thead>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Azioni</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <td><?php echo $user['username']; ?></td>
      <td><?php echo $user['email']; ?></td>
      <td>
        <form action="php/eliminaUtente.php" method="post">
          <input type="hidden" name="id_utente" value="<?php echo $user['id_utente']; ?>">
          <button type="submit" name="eliminaUtente">Elimina</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>

</body>
</html>