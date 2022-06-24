<?php
    session_start();

    if($_SESSION['admin_is_logged'] != true){

        header('Location: index.php');
        exit();
    }

    require_once 'database.php';

    $all_is_ok = true;
    $alreadyExist = $db->prepare('SELECT id FROM produkty WHERE nazwa=:nazwa');
    $alreadyExist->bindValue(':nazwa', $_POST["name"]);
    $alreadyExist->execute();

    if($alreadyExist->rowCount() > 0){

        $_SESSION['product_err'] = "Już istnieje taki produkt";
        $all_is_ok = false;
    }

    if($all_is_ok){
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

    } else {

        header("Location: admin_page.php");
        exit();
    }



    header('Location: index.php');