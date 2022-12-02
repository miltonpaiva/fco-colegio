<?php

/**
 * summary
 */
class SaveImage
{
    public $path_img;

    public function __construct()
    {
    	$this->path_img = str_replace(basename(__FILE__), '', $_SERVER['SCRIPT_FILENAME']);
    }

    public function upload()
    {

		$data_json = file_get_contents('php://input');
		try {
			$data_image = json_decode($data_json, true);

			$data      = $data_image['imageBase64'];
			$file_name = $data_image['file_name'];

			if (!preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
			    throw new \Exception('did not match data URI with image data');
			}

		    $data = substr($data, strpos($data, ',') + 1);
		    $type = strtolower($type[1]); // jpg, png, gif

		    if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
		        throw new \Exception('invalid image type');
		    }

		    $data = str_replace( ' ', '+', $data );
		    $data = base64_decode($data);

		    if ($data === false) {
		        throw new \Exception('base64_decode failed');
		    }

			file_put_contents("{$this->path_img}/images/{$file_name}.{$type}", $data);

			$response['success'] = true;
			$response['message'] = 'imagem de assinatura criada com sucesso';
			$response['data']    = ['image' => "assinatura.{$type}"];

			echo json_encode($response);
			exit;

		} catch (Exception $e) {
			$response['success'] = false;
			$response['message'] = 'não foi possivel criar a imagem da assinatura';
			$response['data']    = ['path_img' => "{$this->path_img}assinatura.{$type}", 'error' => $e->getMessage()];

			echo json_encode($response);
			exit;
		}

    }

}

$sv = new SaveImage();
$sv->upload();

