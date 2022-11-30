<?php

include_once 'BaseClass.php';

/**
 * realiza o insert na tabela de usuarios
 */
class Users extends BaseClass
{
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

		try {

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

		} catch (Exception $e) {
			$message = "não foi possivel completar a ação";
			$data    = $e->getMessage();
			BaseClass::returnError($message, $data);
		} catch (Error $e) {
			$message = "não foi possivel completar a ação";
			$data    = $e->getMessage();
			BaseClass::returnError($message, $data);
		}
    }
}

if (isset($_REQUEST['action'])) {
	$u = new Users();

	// VALIDAÇÃO DA EXISTENCIA DO METODO
	if (!method_exists($u, $_REQUEST['action'])) {
        $message = "há uma rota que não foi encontrada [{$_REQUEST['action']}]";
        BaseClass::returnError($message);
	}

	try {
		$u->{$_REQUEST['action']}();
	} catch (Exception $e) {
		$message = "não foi possivel executar o metodo [{$_REQUEST['action']}]";
		$data    = $e->getMessage();
		BaseClass::returnError($message, $data);
	} catch (Error $e) {
		$message = "não foi possivel executar o metodo [{$_REQUEST['action']}]";
		$data    = $e->getMessage();
		BaseClass::returnError($message, $data);
	}
}