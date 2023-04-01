<?php

class DatabaseConnection
{
    private static ?self $instance = null;

    private PDO $pdo;

    private function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ];

        $this->pdo = new PDO('mysql:host=localhost;dbname=query_builder', 'root', '', $options);
    }

    public static function getInstance(): self
    {
        if (! self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
