<?php
session_start();
if(!isset($_SESSION['is_logged'])){

    header("Location: cukierki");
    exit();
}

//system to add and remove product
require_once 'cart_action.php';

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cukierki</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>

<div class="container">

    <header>

        <nav class="navbar navbar-dark bg-dark navbar-border navbar-expand-lg">
            <a class="navbar-brand" href="cukierki"><img src="img/lollipop.png" width="32" height="32" alt="" class="d-inline-block align-bottom"> Cukierki.pl</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainmenu">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a href="cukierki" class="nav-link"> Start</a>
                    </li>

                </ul>

                <?php

                echo '<a href="user_options.php" class="btn btn-outline-light button-margin mr-3" role="button">Konto</a>';
                echo '<a href="logout_user.php" class="btn btn-outline-light button-margin" role="button">Wyloguj</a>';

                ?>

            </div>

        </nav>


    </header>

    <main>
        <div class="row">



                        <?php
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                            echo '<div class="m-auto">
                                    <h1 class="h2"> Koszyk </h1>
                                  </div>';


                            echo "<div class='table-responsive mt-4'>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <th>Nazwa</th>
                                            <th>Ilość</th>
                                            <th>Cena</th>
                                            <th>Suma</th>
                                            <th>Usuń</th>
                                        </tr>";

                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {
                                $price = $values['item_quantity'] * $values['item_price'];

                                echo
                                    "<tr>
                                        <td>{$values['item_name']}</td>
                                        <td class='text-right'>{$values['item_quantity']} 
                                         
                                        <form style='display: inline-block;' method='post' action='cart_page.php?action=add&id={$values['item_id']}'>
                                              <input type='hidden' name='name' value='{$values['item_name']}'>
                                              <input type='hidden' name='price' value='{$values['item_price']}'>
                                              <input type='hidden' name='quantity' value='1'>
                                              <button  class='btn btn-outline-primary btn-sm' name='add_to_cart' type='submit' onclick='addProduct()'>+</button>
                                        </form>
                                            
                                        <td>{$values['item_price']}</td>
                                        <td>{$price}</td>
                                        <td><a class='text-danger' href='cart_page.php?action=delete&id={$values['item_id']}'>Usuń</a></td>
                                    </tr>";

                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }

                            echo "
                                        <tr>
                                            <td colspan='3' class='text-right'>Suma końcowa</td>
                                            <td class='text-right'>$total zł</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                 ";

                            $_SESSION['final_price'] = $total;
                            echo '<a href="deliver_page.php" class="btn btn-outline-success btn-block">Przejdź dalej</a>';

                        } else {

                            echo "<div class='col-12 text-center my-3 bigText'>
                                    Koszyk jest Pusty
                                  </div>";
                        }
                        ?>

        </div>
    </main>

    <footer class="card-footer text-center border border-top-0 border-dark">

        <div>
            Strona stworzona przez: Paweł Pepliński
        </div>

        <div>
            Wszelkie prawa zastrzeżone &copy; <?php echo date("Y"); ?>
        </div>

    </footer>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
