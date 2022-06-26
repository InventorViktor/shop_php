<?php
    session_start();

    if($_SESSION['admin_is_logged'] != true){

        header('Location: cukierki');
        exit();
    }

    require_once 'database.php';

    $removeProduct = $db->prepare('DELETE FROM produkty WHERE id = :id');

    $removeProduct->bindValue(':id',$_GET["id"] );
    $removeProduct->execute();

    header('Location: cukierki');