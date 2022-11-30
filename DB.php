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
        self::$servername = "t07cxyau6qg7o5nz.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        self::$username   = "xyig90swkqv4oprt";
        self::$password   = "tpq26s8qtz8k315d";
        self::$database   = "kuv0hvqh598ze6l5";

        session_start();
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