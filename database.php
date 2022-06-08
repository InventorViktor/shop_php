<?php

    require_once 'config_connection_db.php';

    try{

        $db = new PDO("mysql:host={$host};
                            dbname={$database};
                            charset=utf8",
                            $user,
                            $password,
                            array(PDO::ATTR_EMULATE_PREPARES => false)
                            );
    } catch (Exception $error){

        echo $error->getMessage(); //TODO: usunąć tą linijkę
        exit('Database error');
    }