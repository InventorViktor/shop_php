<?php
    if(!isset($_GET['id'])){
        header('Location: index.php');
        exit();
    }

    //you need $_GET['id'] -> product id
    require_once 'database.php';

    $more_info = $db->prepare('SELECT nazwa, cena, d_opis, obraz FROM produkty WHERE id = :id');

    $more_info->bindValue('id', $_GET['id']);
    $more_info->execute();

    $product_row = $more_info->fetch();

    echo '<p class="fw-bold fs-1">'. $product_row['nazwa'] . '</p>';

    echo
    "<aside class='col-md-4'>
            <img class='img-fluid' src='img/{$product_row['obraz']}'  alt='img/produktu'>
        </aside>";

    echo
        '<div class="col-md-8">
            '. $product_row["d_opis"] .'
        </div>';

    if(isset($_SESSION['is_logged'])){

        echo
        '<button class="btn btn-outline-success mt-3">Dodaj do koszyka</button>';
    } else {

        echo '<p class="fw-bold">Zaloguj się aby dodać produkt do koszyka</p>';
    }

