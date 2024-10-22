<?php

require_once 'connection.php';

class GetModel {

    static public function getData( $table, $select, $column ) {

        $sql = "select $select from $table ORDER BY $column desc";

        $stmt = Connection::connect()->prepare( $sql );

        $stmt->execute();

        return $stmt->fetchAll( PDO::FETCH_CLASS );
    }

    static public function getDataFilter( $table, $select, $linkTo, $equalTo ) {

        $linkToArray = explode(",", $linkTo);
        $equalToArray = explode("_",$equalTo);
        $linkToText = ""; 

        if(count($linkToArray)>1){

            foreach ($linkToArray as $key => $value) {
                
                if($key > 0){
                    $linkToText .= "AND ".$value." = :".$value." ";
                }
            }
        }


        $sql = "select $select from $table where $linkToArray[0] = :$linkToArray[0] $linkToText";
       
        $stmt = Connection::connect()->prepare( $sql );

        foreach ($linkToArray as $key => $value) {
            
            $stmt->bindParam( ':'.$value, $equalToArray[$key], PDO::PARAM_STR );

        }

        $stmt->execute();

        return $stmt->fetchAll( PDO::FETCH_CLASS );
    }
}
