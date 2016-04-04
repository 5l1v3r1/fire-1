<?php

class User Extends DBConnection {

    public function __construct() {
        parent::__construct();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM host WHERE email = :email AND password = :password";
        $statment = $this->con->prepare($sql);
        $output = $statment->execute([':name' => $email],[':password' => $password]);
        if($this->valid($statment, $output)) {
            if (sizeof($statment->fetch(PDO::FETCH_ASSOC)) != 0)
                return true;
        else
            return false;
    }
}