<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.11.2017
 * Time: 08:28
 */

abstract class AbstractDatabase
{
    private static $SERVER = "localhost";
    private static $USER = "goguser";
    private static $PASSWORD = "gogpasswort";
    private static $DB = "gog";
    protected $connection;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    private function getConnection(){
        $connection = new mysqli(self::$SERVER, self::$USER, self::$PASSWORD, self::$DB);
        if ($connection->connect_error) {
            die("Connection failed" . $connection->connect_error);
        }
        return $connection;
    }

    public function close() {
        if ($this->connection != null) {
            $this->connection->close();
        }
    }
}