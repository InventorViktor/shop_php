<?php
require_once 'database.php';

//sort product
if(!isset($_GET['type'])){

    $sort =  $db->query("SELECT * FROM produkty");
}
elseif($_GET['type'] == 'all'){

    $sort =  $db->query("SELECT * FROM produkty");
} else {

    $sort = $db->prepare("SELECT * FROM produkty WHERE type = :type");
    $sort->bindValue(':type', $_GET['type']);
    $sort->execute();
}

if (!$sort){

    echo "BŁĄD w zapytaniu";
    exit();
}

while($row = $sort->fetch()){

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
