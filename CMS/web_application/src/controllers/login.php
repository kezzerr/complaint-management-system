<?php

//login controller class which handles login functionality

require_once __DIR__ . '/../models/userRepo.php';

class LoginController {

    private $userRepo;

    public function __construct() {
        
        require_once __DIR__ . '/../models/userRepo.php';
        $this->userRepo = new UserRepository();
    }

    public function handleLogin() {

        $erroruser = "";
        $errorpass = "";
        $allFields = true;

        if (isset($_POST['submit'])) {

            if (empty($_POST['user'])) {
                $erroruser = "⚠️ Username is mandatory";
                $allFields = false;
            }

            if (empty($_POST['pass'])) {
                $errorpass = "⚠️ Password is mandatory";
                $allFields = false;
            }

            if ($allFields) {
                $user = $this->userRepo->verify($_POST['user'], $_POST['pass']);

                if ($user) {
                    
                    session_start();
                    $_SESSION["role"]  = $user["role"];
                    $_SESSION["name"]  = $user["username"];
                    $_SESSION["user_id"] = $user["user_id"];
                    $_SESSION["org_id"]  = $user["org_id"];
                    $_SESSION["login_time_stamp"] = time();

                    if ($user['role'] === 'consumer') {
                    header("Location: home.php");
                    } else if ($user['role'] === 'help desk agent') {
                    header("Location: home.php");
                    }

                } else {
                    $errorpass = "⚠️ Invalid username/password combination";
                }
            }
        }

        return [
            "erroruser" => $erroruser,
            "errorpass" => $errorpass
        ];

    }
}