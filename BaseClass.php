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

    protected static $relations;
    protected static $formats;

    public function __construct()
    {
    	self::$routes['users_insert'] = 'Users.php?action=index';
    	@session_start();
    }

    public static function getRoute($route)
    {
        // garantindo a instancia
        if (!isset(self::$routes)) { new BaseClass(); }

    	if (!isset(self::$routes[$route])) {
            $message = "há uma rota que não foi encontrada [{$route}]";
            BaseClass::returnError($message);
    	 }

    	return self::$routes[$route];
    }

    public function insert($table, $columns, $values)
    {
        // garantindo a instancia
        if (!isset(self::$routes)) { new BaseClass(); }

        self::$DB = DB::getConnection();

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
            $message = "houve um problema ao inserir o registro";
            $data    = [$sql, $e->getMessage()];
            BaseClass::returnError($message, $data);
        }
    }

    /**
     * APLICA A FORMATAÇÃO CONFORME PREDEFINIDO
     * @param  string $column
     * @param  string $value
     * @return string
     */
    protected function formats($column, $value)
    {
        // quando não houver formatação para alguma coluna
        if (!isset(self::$formats[$column])) return $value;

        $format = self::$formats[$column];
        return $this->{$format}($value);
    }

    /**
     * remove todos os caracteres não numericos
     * @param  string $str
     * @return string
     */
    protected function only_numbers($str)
    {
        return preg_replace('/[^0-9]/', '', $str);
    }

    /**
     * FORMATA A DATA PARA INSERÇÃO
     * @param  string $str
     * @return string
     */
    protected function db_date($str)
    {
        return date("Y-m-d", strtotime($str));
    }

    public static function returnError($message, $data = [])
    {
        // garantindo a instancia
        if (!isset(self::$routes)) { new BaseClass(); }

        unset($_SESSION['error']);

        $_SESSION['error'] =
        [
            'message' => $message,
            'data'    => $data,
        ];

        header("Location: {$_SERVER['HTTP_REFERER']}erro.php");
        die();
    }
}