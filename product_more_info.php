<?php
    if(!isset($_GET['id'])){
        header('Location: cukierki');
        exit();
    }

    require_once 'cart_action.php';

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

    echo
        '<div class="col-md-8 mt-2">
            '. $product_row["cena"] . " zł" .
        '</div>';

    if(isset($_SESSION['is_logged'])){

        echo "<form method='post' action='product_page.php?action=add&id={$_GET['id']}'>
                  <input type='number' name='quantity' class='form-control mt-1' value='1'>
                  <input type='hidden' name='name' value='{$product_row['nazwa']}'>
                  <input type='hidden' name='price' value='{$product_row['cena']}'>
                  <button  class='btn btn-outline-success mt-2' name='add_to_cart' type='submit' onclick='addProduct()'>Dodaj do koszyka</button>
              </form>";
    } else {

        echo '<p class="fw-bold">Zaloguj się aby dodać produkt do koszyka</p>';
    }

