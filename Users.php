<?php

include_once 'BaseClass.php';

/**
 * realiza o insert na tabela de usuarios
 */
class Users extends BaseClass
{
	private static $relations;
	private static $formats;

    public function __construct()
    {
		self::$relations['first_name']  = 'name';
		self::$relations['last_name']   = 'surname';
		self::$relations['cpf']         = 'cpf';
		self::$relations['data_nasc']   = 'birth_date';
		self::$relations['age']         = 'age';
		self::$relations['rua']         = 'road';
		self::$relations['numero']      = 'road_number';
		self::$relations['cep']         = 'post_code';
		self::$relations['bairro']      = 'district';
		self::$relations['Complemento'] = 'complement';
		self::$relations['cidade']      = 'County';
		self::$relations['uf']          = 'uf';
		self::$relations['celular']     = 'cell_phone';
		self::$relations['fixo']        = 'residential';
		self::$relations['email']       = 'email';
		self::$relations['senha']       = 'password';

		self::$formats['cpf']         = 'only_numbers';
		self::$formats['age']         = 'only_numbers';
		self::$formats['road_number'] = 'only_numbers';
		self::$formats['post_code']   = 'only_numbers';
		self::$formats['cell_phone']  = 'only_numbers';
		self::$formats['residential'] = 'only_numbers';

		self::$formats['birth_date']  = 'db_date';
    }

    /**
     * PREPARA OS DADOS PARA INSERÇÃO NA BASE
     * @return [type] [description]
     */
    public function index()
    {
    	$values  = [];
    	$columns = [];

    	foreach (self::$relations as $form_input => $column) {

    		// removendo colunas que não foram enviadas ou estão vazias
    		if (isset($_REQUEST[$form_input]) && $_REQUEST[$form_input] != '') {
    			$columns[] = $column;

    			// aplicando formatação nos campos que forem necessarios
    			$values[]  = $this->formats($column, $_REQUEST[$form_input]);
    		}
    	}

		$result = $this->insert('users', $columns, $values);
		if ($result) {
			echo 'inserido';
		}
    }

    /**
     * APLICA A FORMATAÇÃO CONFORME PREDEFINIDO
     * @param  string $column
     * @param  string $value
     * @return string
     */
    private function formats($column, $value)
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
    private function only_numbers($str)
    {
    	return preg_replace('/[^0-9]/', '', $str);
    }

    /**
     * FORMATA A DATA PARA INSERÇÃO
     * @param  string $str
     * @return string
     */
    private function db_date($str)
    {
    	return date("Y-m-d", strtotime($str));
    }
}

if (isset($_REQUEST['action'])) {
	$u = new Users();

	// VALIDAÇÃO DA EXISTENCIA DO METODO
	if (!method_exists($u, $_REQUEST['action'])) {
	    echo json_encode(["Metodo [{$_REQUEST['action']}] não encontrado"]);
	    exit();
	}

	$u->{$_REQUEST['action']}();
}