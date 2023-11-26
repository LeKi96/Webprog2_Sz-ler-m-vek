<?php require_once('../public/session.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Szélerőművek</title>
    <link rel="stylesheet" type="text/css" href="../public/style.css" />
  </head>
  <body
    style="
      background-image: url('../public/images/background.jpg');
      background-size: cover;
    "
  >

  <?php require_once('../public/navbar.php') ?>
    <br>
    <h1>MAGYARORSZÁG SZÉLERŐMŰVEI</h1>

    <div class="homeContainer">
      <h1>Szélerőművekről</h1>
      <p id="homeWrite">
        Az alternatív energiaforrások fontossága és fenntarthatóság iránti
        érdeklődés egyre növekszik a világ szerte. A szélerőművek olyan
        innovatív technológiai megoldások, amelyek hatalmas potenciált
        rejtene­nek a tiszta energia előállításában. Ezek a hatalmas szerkezetek
        szélenergiát hasznosítanak, és átalakítják azt elektromos árammá,
        miközben minimális környezeti hatással rendelkeznek.
      </p>

      <p id="homeWrite">
        A szélerőművek előnyei közé tartozik az üvegházhatású gázok
        kibocsátásának minimalizálása, az energiafüggetlenség előmozdítása, és a
        fenntartható energiaforrások kiaknázása. Ezenkívül a technológia
        fejlődésével és hatékonyságának javulásával a szélerőművek egyre inkább
        megfizethetővé válnak. A weboldalunkon többet megtudhat erről a
        környezetbarát energiaforrásról, és hogyan járul hozzá a jövő
        fenntartható energiaszükségleteinek kielégítéséhez.
      </p>
    </div>

    <div class="homeButtons">
      <a href="../views/currencyView.php">
        <button id="homeClick">
          Hírek
          <img id="buttonImage" src="../public/images/currencyIcon.png" />
        </button>
      </a>
    </div>

    <!--Footer-->

    <footer>
      <div class="footer-content">
        <p>&copy; 2023 Szélerőművek</p>
        <ul class="footer-links">
          <li><a href="homeView.php">Kezdőlap</a></li>
          <li><a href="currencyView.php">Devizák</a></li>
        </ul>
      </div>
    </footer>
  </body>
</html>
