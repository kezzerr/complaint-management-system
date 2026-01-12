<?php

//home controller class which redirects user to correct homepage

class HomeController {

    public function showHome() {

        session_start();

        if (!isset($_SESSION['role'])) {
            header("Location: index.php");
            exit;
        }

        $role = $_SESSION['role'];

        switch ($role) {
            case 'help desk agent':
                require __DIR__ . '/../views/homeAgent.php';
                break;

            case 'consumer':
                require __DIR__ . '/../views/homeConsumer.php';
                break;

            default:
                header("Location: index.php");
                exit;
        }
        
    }
}