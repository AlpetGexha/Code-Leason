<?php
class User extends dbh
{

    protected function GetUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->connection()->query($sql);
        $NumRow = $result->num_rows;

        if($NumRow > 0){
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }
}

class ViewUsers extends User
{

    public function ShowUsers()
    {
        $datas = $this->GetUsers();
        foreach($datas as $data){
            echo $data['id'] . "<br />";
            echo $data['emri'] . "<br />";
            echo $data['mbiemri']."<br />";
            echo $data['username']."<br />";
            echo $data['email']."<br />";
            echo $data['j_data']."<br /><br /><br />";
        }

    }
}
