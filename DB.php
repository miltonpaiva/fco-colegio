<?php

/**
 * classe responsavel pela conexão com o banco de dados
 */
class DB
{
    private static $servername;
    private static $username;
    private static $password;
    private static $database;
    private static $connection;

    public function __construct()
    {
        self::$servername = "banco";
        self::$username   = "user-trabalho";
        self::$password   = "jkiGOzekHbaqBW6I";
        self::$database   = "db-trabalho";

        @session_start();
        $this->connect();
    }

    private function connect()
    {
        $connect_data = ["mysql:host=", self::$servername, ";dbname=", self::$database];
        try {
            $connect_data = implode('', $connect_data);

            self::$connection = new PDO($connect_data, self::$username, self::$password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            @session_start();
            unset($_SESSION['error']);

            $_SESSION['error'] =
            [
                'message' => "houve um problema ao se conectar com o banco",
                'data'    => [$connect_data, $e->getMessage()]
            ];

            header("Location: {$_SERVER['HTTP_REFERER']}erro.php");
            die();
        }

    }

    public static function getConnection()
    {
        // garantindo a instancia
        if (!isset(self::$connection)) { new DB(); }

        return self::$connection;
    }

}