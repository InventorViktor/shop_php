<?php
session_start();
if(!isset($_SESSION['is_logged'])){

    header("Location: index.php");
    exit();
}
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

                echo '<a href="cart_page.php" class="btn btn-outline-light button-margin mr-3" role="button">Koszyk</a>';
                echo '<a href="logout_user.php" class="btn btn-outline-light button-margin" role="button">Wyloguj</a>';
                ?>

            </div>

        </nav>


    </header>

    <main>
        <div class="row">

            <div class="mb-3 mt-2 m-auto">
                <h1 class="h4">Historia zakupów</h1>
            </div>

            <?php

            require_once 'database.php';
            $sort = $db->prepare("SELECT * FROM cart_history WHERE user_id = :id");
            $sort->bindValue(':id', $_SESSION['is_logged']);
            $sort->execute();

            $i = 0;
                while($row = $sort->fetch()){
                    $i++;
                    echo "<div class='card col-12'>
                            <div class='card-body'>
                            
                            <h5 class='card-title'>Zamówienie nr. {$i}</h5>
                            <p class='card-text'>Cena końcowa: {$row['price']} zł</p>
                           
                         
                            </div>
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

<script src="js/bootstrap.min.js"></script>
</body>
</html>

