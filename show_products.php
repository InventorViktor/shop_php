<?php
//need session to work

require_once 'database.php';

require_once 'cart_action.php';

//sort product
if(isset($_GET['search'])){
    $sort = $db->prepare("SELECT * FROM produkty WHERE nazwa = :name");
    $sort->bindValue(':name', $_GET['search']);
    $sort->execute();
}
elseif(!isset($_GET['type'])){

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
                <a href='product_page.php?id={$row['id']}' class='btn btn-outline-primary mt-1'>Zobacz</a>";

            //add to cart for users
            if(isset($_SESSION['is_logged'])){
                echo "<form method='post' action='index.php?action=add&id={$row['id']}'>
                          <input type='hidden' name='name' value='{$row['nazwa']}'>
                          <input type='hidden' name='price' value='{$row['cena']}'>
                          <input type='hidden' name='quantity' value='1'>
                          <button  class='btn btn-outline-primary mt-2' name='add_to_cart' type='submit' onclick='addProduct()'>Koszyk +</button>
                      </form>";
            }

            //delete for admin
            if(isset($_SESSION['admin_is_logged'])){

                echo "<a href='a_remove_product.php?id={$row['id']}'  class='btn btn-outline-danger mt-2' onclick='removeProduct()'>Usuń produkt</a>";
            }

    echo"   </div>
          </div>";

}
?>
