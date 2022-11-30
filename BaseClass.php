<?php

include_once 'DB.php';

/**
 * classe com metodos base para outras classes
 */
class BaseClass
{
	private static $routes;
    private static $DB;
    private static $project_url;

    public function __construct()
    {
    	self::$routes['users_insert'] = 'Users.php?action=index';
        self::$DB = DB::getConnection();

    	@session_start();
    }

    public static function getRoute($route)
    {
        // garantindo a instancia
        if (!isset(self::$routes)) { new BaseClass(); }

    	if (!isset(self::$routes[$route])) {
            unset($_SESSION['error']);

            $_SESSION['error'][] =
            [
                'message' => "há uma rota que não foi encontrada [{$route}]",
            ];

            header("Location: {$_SERVER['HTTP_REFERER']}erro.php");
            die();
    	 }

    	return self::$routes[$route];
    }

    public function insert($table, $columns, $values)
    {
        // garantindo a instancia
        if (!isset(self::$routes)) { new BaseClass(); }

        // montando as string das colunas e valores
        $str_columns = implode(', ', $columns);
        $str_values  = '"' . implode('", "', $values) . '"';

        $sql =
        "INSERT INTO {$table}
            ($str_columns)
        VALUES
            ($str_values)";

        try {

            // executando a query
            self::$DB->exec($sql);
            return self::$DB->lastInsertId();

        } catch(PDOException $e) {
            unset($_SESSION['error']);

            $_SESSION['error'][] =
            [
                'message' => "houve um problema ao conpletar a ação",
                'data'    => [$sql, $e->getMessage()]
            ];

            header("Location: {$_SERVER['HTTP_REFERER']}erro.php");
            die();

        }
    }
}