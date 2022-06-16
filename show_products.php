<?php
require_once 'database.php';

$query = "SELECT * FROM produkty";

$result =  $db->query($query);

if (!$result){

    echo "BŁĄD w zapytaniu";
    exit;
}

while($row = $result->fetch()){

    echo "<div class='card col-sm-6 col-md-4 col-lg-3'>
            <img src='img/{$row['obraz']}' class='card-img-top' alt='img/produktu'>
            <div class='card-body'>
                <h5 class='card-title'>{$row['nazwa']}</h5>
                <p class='card-text'>{$row['k_opis']}</p>
                <p class='card-text'>{$row['cena']} zł</p>
                <a href='product_page.php?id={$row['id']}' class='btn btn-outline-primary stretched-link'>Zobacz</a>
            </div>
          </div>";

}
?>
