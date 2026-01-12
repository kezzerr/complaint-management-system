<?php

//logout controller class which handles logout functionality

class LogoutController {

    public function handleLogout() {
        
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }
}