<?php
session_start();

if(!isset($_SESSION['is_logged'])){

    header("Location: index.php");
    exit();
}

$name = htmlspecialchars($_POST['name']);
$surname = htmlspecialchars($_POST['surname']);
$email = htmlspecialchars($_POST['email']);
$city = htmlspecialchars($_POST['city']);
$street = htmlspecialchars($_POST['street']);

if(empty($email)){

    $_SESSION['email_err'] = "Podano zły email";
    header("Location: deliver_page.php");
    exit();
}

require_once 'database.php';
$cartHistory = $db->prepare("INSERT INTO cart_history VALUES(NULL, :price, :user_id)");
$cartHistory->bindValue(':price', $_SESSION['final_price']);
$cartHistory->bindValue(':user_id', $_SESSION['is_logged']);
$cartHistory->execute();

unset($_SESSION["shopping_cart"]);
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
            <a class="navbar-brand" href="index.php"><img src="img/lollipop.png" width="32" height="32" alt="" class="d-inline-block align-bottom"> Cukierki.pl</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainmenu">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a href="index.php" class="nav-link"> Start</a>
                    </li>


                </ul>


                <?php
                if(isset($_SESSION['admin_is_logged'])){

                    echo '<a href="logout_admin.php" class="btn btn-outline-light button-margin" role="button">Wyloguj</a>';
                }
                elseif(!isset($_SESSION['is_logged'])){

                    echo '<a href="login_page.php" class="btn btn-outline-light button-margin" role="button">Zaloguj</a>';

                } else {
                    echo '<a href="cart_page.php" class="btn btn-outline-light button-margin mr-3" role="button">Koszyk</a>';
                    echo '<a href="user_options.php" class="btn btn-outline-light button-margin mr-3" role="button">Konto</a>';
                    echo '<a href="logout_user.php" class="btn btn-outline-light button-margin" role="button">Wyloguj</a>';
                }
                ?>

            </div>

        </nav>


    </header>

    <main>

        <div class="text-success bigText text-center">
            Dziękujemy za zakup w naszym sklepie :)
        </div>

        <div class="text-center font-weight-bold">
            <a href="index.php">Powrót na stronę główną</a>
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

<script src="js/bootstrap.min.js"></script>
</body>
</html>