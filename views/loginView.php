<?php
    $host = 'localhost';
    $dbname = 'szeleromuvek'; 
    $username = 'root';
    $password = '';
    $is_invalid = false;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $mysqli = new mysqli($host, $username, $password, $dbname);

        $sql = sprintf('SELECT * FROM felhasznalok WHERE Felhasznalonev = "%s"', $mysqli -> real_escape_string($_POST["username"]));

        $result = $mysqli -> query($sql);

        $user = $result -> fetch_assoc();

        if ($user) {
          if ($_POST["password"] === $user["Jelszo"]) {
              session_start();
      
              $_SESSION["user_id"] = $user["id"];
              header('Location: homeView.php');
              exit;
          }
      }

        $is_invalid = true;
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Bejelentkezés</title>
    <link rel="stylesheet" type="text/css" href="../public/style.css" />
  </head>
  <body
    style="
      background-image: url('../public/images/background.jpg');
      background-size: cover;
    "
  >
    <!--Nav Bar-->
    <?php require_once('../navbar.php') ?>

    <h2 id="HeadLine">BEJELENTKEZÉS</h2>

    <?php if($is_invalid): ?>
        <em>Helytelen felhasználónév és/vagy jelszó!</em>
      <?php endif; ?>
    
    <div id="divs">
      <form method="post">
        <!--Felhasználónév bevitele-->

        <label id="userLabel">Felhasználónév:</label><br />
        <input type="text" name="username" required /><br />

        <!--Jelszó bevitele-->

        <label id="pwdLabel">Jelszó:</label><br />
        <input type="password" name="password" required /><br />

        <!--"Bejelentkezés" gomb-->

        <button id="loginSubmit" type="submit">Bejelentkezés</button>
      </form>
    </div>
  </body>
</html>
