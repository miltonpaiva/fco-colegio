<?php

include_once 'BaseClass.php';

/**
 * realiza o insert na tabela de usuarios
 */
class Terms extends BaseClass
{
    public function __construct()
    {
		self::$relations['text']  = 'term';
    }

    public function getLastTerm()
    {
    	try {
			$stmt = DB::getConnection()->prepare("SELECT * FROM terms ORDER BY id DESC LIMIT 1");
			$stmt->execute();

			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();

			return current($result)['term'];

		} catch (Exception $e) {
			$message = "não foi possivel retornar o termo verifique a conexão";
			$data    = $e->getMessage();
			return BaseClass::returnError($message, $data, false)['error']['message'];
		} catch (Error $e) {
			$message = "não foi possivel retornar o termo verifique a conexão";
			$data    = $e->getMessage();
			return BaseClass::returnError($message, $data, false)['error']['message'];
		}
    }
}

if (isset($_REQUEST['action'])) {
	$t = new Terms();

	// VALIDAÇÃO DA EXISTENCIA DO METODO
	if (!method_exists($t, $_REQUEST['action'])) {
	    echo json_encode(["Metodo [{$_REQUEST['action']}] não encontrado"]);
	    exit();
	}

	$t->{$_REQUEST['action']}();
}