<?php

    require_once 'config_connection_db.php';

    try{

        $db = new PDO("mysql:host={$host};
                            dbname={$database};
                            charset=utf8",
                            $user,
                            $password,
                            );
    } catch (Exception $error){

        //lubie placki
        exit('Database error');
    }