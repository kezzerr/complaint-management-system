<?php

//problem class which encapsulates user data as an object

class User {
    
    public $id;
    public $username;
    public $email;
    public $role;
    public $orgId;

    public function __construct($row) {

        $this->id = $row['user_id'];
        $this->username = $row['username'];
        $this->email = $row['email'];
        $this->role = $row['role'];
        $this->orgId = $row['org_id'];  
    }
}