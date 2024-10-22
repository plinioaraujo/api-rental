<?php 
 require_once "models/get.model.php";

class GetController{
	
	/*=============================================
	REQUISIÇÕES GET SEM FILTRO
	=============================================*/
    static public function getData($table, $select, $column){

		$response = GetModel::getData($table, $select, $column);

		$result = new GetController();
		$result-> fncResponse($response);

        return $result;	
	}

	/*=============================================
	REQUISIÇÕES GET COM FILTRO
	=============================================*/
    static public function getDataFilter($table, $select, $linkTo, $equalTo ){

		$response = GetModel::getDataFilter($table, $select, $linkTo, $equalTo);

		$result = new GetController();
		$result-> fncResponse($response);

        return $result;	
	}
	
	/*=============================================
	RESPOSTA DO CONTROLADOR
	============================================*/
	
	public function fncResponse($response){

		if(!empty($response)){

			$json = array(
				'status' => 200,
				'total' => count($response),
				'result' => $response
			);
			
		}else{
			$json = array(
				'status' => 404,				
				'result' => 'not found'
			);
		}
			echo json_encode( $json, http_response_code( $json[ 'status' ] ) );
			
	}

}