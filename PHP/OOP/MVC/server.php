<?php
class Test extends Dbh
{

    public function GetUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->connection()->query($sql);
        while($row = $result->fetch()){
            echo $row['id'] . "<br />";
            echo $row['emri'] . "<br />";
            echo $row['mbiemri']."<br />";
            echo $row['username']."<br />";
            echo $row['email']."<br />";
            echo $row['j_data']."<br /><br /><br />";
        }

    }

    public function GetUsersStmt($E,$M)
    {
        $sql = "SELECT * FROM users where emri = ? AND mbiemri = ?";
        $result = $this->connection()->prepare($sql);
        $result->execute([$E,$M]);
        $name = $result->fetchAll();

        foreach ($name as $names){

            echo $names['id'] . "<br />";
            echo $names['emri'] . "<br />";
            echo $names['mbiemri']."<br />";
            echo $names['username']."<br />";
            echo $names['email']."<br />";
            echo $names['j_data']."<br /><br /><br />";
        }

    }

    public function InsertUser($emri,$mbiemri,$email){
        $sql = "INSERT Into users(emri,mbiemri,email) 
                            VALUE(?,?,?) ";
        $result= $this->connection()->prepare($sql);
        $result->execute([$emri,$mbiemri,$email]);

    }

}
