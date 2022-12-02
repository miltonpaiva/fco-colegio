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
        self::$routes['error']        = 'erro.php';
    	@session_start();
    }

    public static function getRoute($route)
    {
        // garantindo a instancia
        if (!isset(self::$routes)) { new BaseClass(); }

    	if (!isset(self::$routes[$route])) {
            $message = "há uma rota que não foi encontrada [{$route}]";
            return self::$routes['error'] . '?message=' . $message;
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

    public static function returnError($message, $data = [], $redirect = true)
    {
        // garantindo a instancia
        if (!isset(self::$routes)) { new BaseClass(); }

        unset($_SESSION['error']);

        $_SESSION['error'] =
        [
            'message' => $message,
            'data'    => $data,
        ];

        $project_dir = dirname($_SERVER['SCRIPT_NAME']);
        $project_url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}{$project_dir}";

        if ($redirect) {
            header("Location: {$project_url}/" . self::$routes['error']);
            exit();
        }

        $_SESSION['error']['message'] .= "<a href='{$project_url}/" . self::$routes['error'] . "' target='blank' > clique aqui para ver o erro </a>";

        return ['error' => $_SESSION['error']];
    }
}