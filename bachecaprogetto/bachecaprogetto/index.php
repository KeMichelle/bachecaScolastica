<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./style/anteprima.css" />

    <title>Bacheca</title>
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

    <!--section 1-->
    <div class="section1">
      <div class="content1">
        <img class="imgAnteprima" src="./img/imgHolder.png" />
        <div class="boxdesc">
          <p class="descrizioneSection1">
            Questa bacheca é stata creata per tutte le persone in bisogno di una
            mano per migliorare il proprio stile di vita. Questo sito é solo una
            demo per un’esercitazione in classe.
          </p>
        </div>
      </div>
    </div>

    <!--spacer-->
    <div class="spacer">
      <div class="contenuto">
        <h1 class="titoloSpacer">Post Recenti</h1>
        <p class="descSpacer">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud.
        </p>
      </div>
    </div>

    <!--bacheca con i post-->

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
