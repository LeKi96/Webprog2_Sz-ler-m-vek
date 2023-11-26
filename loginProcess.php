<?php
// index.php

class LoginModel {
    private $host = 'localhost';
    private $dbname = 'szeleromuvek';
    private $username = 'root';
    private $password = '';

    public function validateUser($inputUsername, $inputPassword) {
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        $sql = sprintf('SELECT * FROM felhasznalok WHERE Felhasznalonev = "%s"', $mysqli->real_escape_string($inputUsername));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if ($user && $inputPassword === $user['Jelszo']) {
            return $user['id'];
        }

        return false;
    }
}

class LoginController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = $this->model->validateUser($username, $password);

            if ($userId !== false) {
                session_start();
                $_SESSION['user_id'] = $userId;
                header('Location: ../views/homeView.php');
                exit;
            } else {
                $is_invalid = true;
            }
        }

        require 'loginView.php';
    }
}

// Példányosítás és kezelés
$model = new LoginModel();
$controller = new LoginController($model);
$controller->handleRequest();
?>