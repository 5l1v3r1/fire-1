<?php
class DBConnection{
    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = 'root';

    function __construct($dbname = 'fire_db'){
        $dsn = ($dbname === NULL) ?
            "mysql:host={$host}" :
            "mysql:dbname={$dbname};host={$this->host}";
        try {
            $this->con = new PDO($dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
    }
}