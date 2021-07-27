<?php

class dbh{
    private $servername, $username, $password, $database;

    protected function connection(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "alpetgtech";

        $db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        return $db;
    }
}
