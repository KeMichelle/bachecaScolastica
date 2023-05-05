<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/registrati.css" />
    <title>Bacheca Login!</title>
  </head>
  <body>
    <!--Header-->
    <header class="header">
      <div class="titleBacheca">Bacheca</div>
      <div class="sections">
        <nav>
          <ul>
            <li><a href="index.php">Blog</a></li>
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

    <!--Section with image and login form-->
    <div class="container">
      <div class="imgBox">
        <img class="imgReg" src="./img/roundedimg.png" />
      </div>
      <div class="formBox">
        <div class="formtitle">
          <div class="titleText">Login</div>
          <img class="line1" src="./img/line1.svg" />
        </div>
        <div class="formContent">
          <form action="php/login.php" method="post">
            <br />
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required />
            <br /><br />
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required />
            <br /><br />

            <input type="submit" value="Login" />
          </form>
        </div>
      </div>
    </div>
    
    <?php
    session_start();
    if(isset($_SESSION['registrato'])){
      unset($_SESSION['registrato']);
      session_destroy();
    }
    ?>

    <script src="./scripts/getStarted.js"></script>
  </body>
</html>
