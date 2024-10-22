<?php

require_once 'models/connection.php';
require_once 'controllers/get.controller.php';

$routesArray = explode( '/', $_SERVER[ 'REQUEST_URI' ] );
$routesArray = array_filter( $routesArray );

if ( count( $routesArray ) == 0 ) {


    $json = array(
        'status' => 404,
        'result' => 'Not found'
    );

    echo json_encode( $json, http_response_code( $json[ 'status' ] ) );

    return;

}

if ( count( $routesArray ) == 1 && isset( $_SERVER[ 'REQUEST_METHOD' ] ) ) {

    $table = explode( '?', $routesArray[ 1 ] )[ 0 ];

    
    if ( count( $routesArray ) == 1 && isset( $_SERVER[ 'REQUEST_METHOD' ] )
    &&  $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {

        include 'services/get.php';

    }
}

