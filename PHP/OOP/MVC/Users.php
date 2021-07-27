<?php


class Users extends Dbh
{

    protected function getUser($name) {

        $sql = "SELECT * FROM users where emri = ?";
        $result = $this->connection()->prepare($sql);
        $result->execute([$name]);

        $row = $result->fetchAll();
        return $row;
    }

    protected function setUser($emri,$mbiemri,$email){
        $sql = "INSERT Into users(emri,mbiemri,email) 
                            VALUE(?,?,?) ";
        $result= $this->connection()->prepare($sql);
        $result->execute([$emri,$mbiemri,$email]);
    }

}