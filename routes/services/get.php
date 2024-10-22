<?php

require_once 'controllers/get.controller.php';

$table = explode( '?', $routesArray[ 1 ] )[ 0 ];

$select = $_GET[ 'select' ] ?? '*';
$orderBy = $_GET[ 'orderBy' ] ?? null;
$orderMode = $_GET[ 'orderMode' ] ?? null;
$startAt = $_GET[ 'startAt' ] ?? null;
$endAt = $_GET[ 'endAt' ] ?? null;
$filterTo = $_GET[ 'filterTo' ] ?? null;
$inTo = $_GET[ 'inTo' ] ?? null;

$response = new GetController();

if ( isset( $_GET[ 'linkTo' ] ) && isset( $_GET[ 'equalTo' ] ) ) {

    $response->getDataFilter( $table, $select, $_GET[ 'linkTo' ], $_GET[ 'equalTo' ] );

}else{
    $response->getData( $table, $select, $orderBy );
}


