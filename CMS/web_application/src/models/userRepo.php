<?php

//problem repository class which retrieves requested user data from the database

class UserRepository {

    private $db;

    public function __construct() {

        $this->db = new SQLite3("C:\\xampp\\database\\cms.db");
    }

    public function getAllUsers() { //retrieves all user data from the database

        $stmt = $this->db->prepare("SELECT * FROM users");
        $result = $stmt->execute();
        $users = [];

        while ($row = $result->fetchArray(SQLITE3_NUM)) {
            $users[] = $row;
        }

        return $users;
    }

    public function getUsersByEmail($email) { //retrieves user data from the database using user email address
        
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        $result = $stmt->execute();

        $users = [];
        while ($row = $result->fetchArray(SQLITE3_NUM)) {
            $users[] = $row;
        }

        return $users;
    }

    public function verify($username, $password) { //verification process for user login

        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE username = :user AND password = :pass"
        );

        $stmt->bindParam(':user', $username, SQLITE3_TEXT);
        $stmt->bindParam(':pass', $password, SQLITE3_TEXT);

        $result = $stmt->execute();
        $user = $result->fetchArray(SQLITE3_ASSOC);

        return $user ?: null;
    }   
}