<?php

interface ConnectionInterface
{
    public function connect();
}
class DB implements ConnectionInterface
{
    public function connect()
    {
        // code
    }
}

class PasswordReminder
{
    /**
     * @var MySqliConnection
     */
    private $dbConnection;
    // public function __construct(MySqliConnection $dbConnection){...}
    // highe level code do not need to depen on low level code instend he need to depent on apstraction
    // and low level code depend on same apstraction aswell
    public function __construct(ConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}
