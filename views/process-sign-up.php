<?php
    $host = 'localhost';
    $dbname = 'szeleromuvek'; 
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kapcsolódási hiba: " . $conn->connect_error);
    }

    $vezeteknev = $_POST['lastName'];
    $keresztnev = $_POST['firstName'];
    $felhasznalonev = $_POST['username'];
    $jelszo = $_POST['password'];

    $sql = "INSERT INTO felhasznalok (Vezeteknev, Keresztnev, Felhasznalonev, Jelszo) VALUES ('$vezeteknev', '$keresztnev', '$felhasznalonev', '$jelszo')";


    if ($conn->query($sql) === TRUE) {
        echo "Regisztráció sikeres";
    } else {
        echo "Hiba a rekord beszúrásakor: " . $conn->error;
    }

    $conn->close();
    sleep(1);

    header("Location: homeView.php");
    exit();
?>
