<?php
    session_start();

    if($_SESSION['admin_is_logged'] != true){

        header('Location: index.php');
        exit();
    }

    require_once 'database.php';

    $removeProduct = $db->prepare('DELETE FROM produkty WHERE id = :id');

    $removeProduct->bindValue(':id',$_POST["id"] );
    $removeProduct->execute();

    header('Location: admin_page.php');