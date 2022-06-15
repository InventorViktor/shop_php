<?php

    $connect =  require_once 'config_connection_db.php';

    try{

        $db = new PDO("mysql:host={$connect['host']};
                            dbname={$connect['database']};
                            charset=utf8",
                            $connect['user'],
                            $connect['password'],
                            array(PDO::ATTR_EMULATE_PREPARES => false)
                            );
    } catch (Exception $error){

        echo $error->getMessage(); //TODO: usunąć tą linijkę
        exit('Database error');
    }