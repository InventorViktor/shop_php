<?php
    session_start();

    if($_SESSION['admin_is_logged'] != true){

        header('Location: index.php');
        exit();
    }

    require_once 'database.php';

    $addProduct = $db->prepare('INSERT INTO produkty VALUES (NULL,
                             :name,
                             :price,
                             :amount,
                             :short_d,
                             :long_d,
                             :type,
                             :jpg)');

    $addProduct->bindValue(':name',$_POST["name"] );
    $addProduct->bindValue(':price',$_POST["price"] );
    $addProduct->bindValue(':amount',$_POST["amount"] );
    $addProduct->bindValue(':short_d',$_POST["short_d"] );
    $addProduct->bindValue(':long_d',$_POST["long_d"] );
    $addProduct->bindValue(':type',$_POST["type"] );
    $addProduct->bindValue(':jpg',$_POST["jpg"] );
    $addProduct->execute();

    header('Location: admin_page.php');