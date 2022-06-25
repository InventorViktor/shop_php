<?php
    session_start();
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

                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a href="index.php" class="nav-link"> Start</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"> Kategorie</a>

                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="index.php?type=all"> Wszystko</a>
                            <a class="dropdown-item" href="index.php?type=baton"> Batoniki</a>
                            <a class="dropdown-item" href="index.php?type=lizak"> Lizaki</a>
                            <a class="dropdown-item" href="index.php?type=asc"> Cena rosnąco</a>
                            <a class="dropdown-item" href="index.php?type=desc"> Cena malejąco</a>

                        </div>

                    </li>

                </ul>

                <form class="form-inline m-auto" method="get" action="index.php"> <!-- TODO: add action and method -->

                    <input class="form-control mr-2 h-25" name="search" type="search" placeholder="Wyszukaj">
                    <button type="submit" class="btn btn-outline-light">Znajdź</button>

                </form>

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

        <div class="row">
            <?php
                require_once 'show_products.php';
            ?>
        </div>

        <?php
            if(isset($_SESSION['admin_is_logged'])){

                echo "<a href='admin_page.php' class='btn btn-outline-success btn-block mt-4'>Dodaj produkt</a>";
            }
        ?>

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