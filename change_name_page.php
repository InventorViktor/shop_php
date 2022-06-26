<?php
session_start();
if(!isset($_SESSION['is_logged'])){

    header("Location: cukierki");
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

                echo '<a href="#" class="btn btn-outline-light button-margin mr-3" role="button">Koszyk</a>';
                echo '<a href="user_options.php" class="btn btn-outline-light button-margin mr-3" role="button">Konto</a>';
                echo '<a href="logout_user.php" class="btn btn-outline-light button-margin" role="button">Wyloguj</a>';
                ?>

            </div>

        </nav>


    </header>

    <main>

        <h1 class="text-center h3">Podaj nowe imię</h1>

        <?php
        if(isset($_SESSION['new_name'])){

            echo "<div class='text-success text-center bigText'>{$_SESSION['new_name']}</div>";
            unset($_SESSION['new_name']);
        }
        ?>

        <form style="max-width: 400px; margin: auto;" method="post" action="change_name.php" >


            <input name="new_name" type="text" class="form-control mt-5" required autofocus>
            <button class="btn btn-outline-success button-margin btn-block mt-3" type="submit">Potwierdz zmiany</button>
        </form>



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



