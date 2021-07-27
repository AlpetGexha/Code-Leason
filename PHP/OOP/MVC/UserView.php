<?php


class UserView extends Users
{
public function shotUsers($name)
{

    $row = $this->getUser($name);
    echo "Full name: ".$row[0]['emri']."  ".$row[0]['mbiemri']." <br /> ";
    echo "Username: ".$row[0]['username']." ";
}
}