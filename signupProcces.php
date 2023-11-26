<?php

class SignupModel {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'szeleromuvek'; 
        $username = 'root';
        $password = '';

        $this->conn = new mysqli($host, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Kapcsolódási hiba: " . $this->conn->connect_error);
        }
    }

    public function registerUser($vezeteknev, $keresztnev, $felhasznalonev, $jelszo) {
        $sql = "INSERT INTO felhasznalok (Vezeteknev, Keresztnev, Felhasznalonev, Jelszo) VALUES ('$vezeteknev', '$keresztnev', '$felhasznalonev', '$jelszo')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

class SignupController {
    private $model;

    public function __construct() {
        $this->model = new SignupModel();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
            $this->register();
        } else {
            // Megjelenítési logika itt lehet, ha szükséges
            require_once('../views/signupView.php');
        }
    }

    private function register() {
        $vezeteknev = $_POST['lastName'];
        $keresztnev = $_POST['firstName'];
        $felhasznalonev = $_POST['username'];
        $jelszo = $_POST['password'];

        $success = $this->model->registerUser($vezeteknev, $keresztnev, $felhasznalonev, $jelszo);

        if ($success) {
            echo "Regisztráció sikeres";
        } else {
            echo "Hiba a rekord beszúrásakor";
        }

        $this->model->closeConnection();
    }
}

// Azonnal kezeljük le a kérést
$signupController = new SignupController();
$signupController->handleRequest();

?>