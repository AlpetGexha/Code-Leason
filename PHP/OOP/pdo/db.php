<?php

class Dbh{
    private $servername, $username, $password, $database;

    protected function connection(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "alpetgtech";


        $pdo = new PDO('mysql:host=' . $this->servername . ';dbname='. $this->database, $this->username,$this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
