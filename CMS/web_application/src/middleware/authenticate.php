<?php

//authentication middleware class which restricts application access to specific users

class Authenticate {

    public static function startSession() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function requireAgent() {

        self::startSession();
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== "help desk agent") {
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }

    public static function requireConsumer() {

        self::startSession();
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== "consumer") {
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }
}