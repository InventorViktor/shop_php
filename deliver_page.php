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
                    echo '<a href="user_options.php" class="btn btn-outline-light button-margin mr-3" role="button">Konto</a>';
                    echo '<a href="logout_user.php" class="btn btn-outline-light button-margin" role="button">Wyloguj</a>';

                ?>

            </div>

        </nav>


    </header>

    <main>
        <div class="row">

            <form style="max-width: 400px; margin: auto;" method="post" action="order.php">

                <div class="mb-3 mt-2 text-center">
                    <h1 class="h4">Uzupełnij dane do dostawy</h1>
                </div>

                <div class="mb-2">

                    <label>Imię:</label>
                    <input type="text" name="name" class="form-control" required autofocus>

                </div>

                <div class="mb-2">

                    <label>Nazwisko:</label>
                    <input type="text" name="surname" class="form-control" required autofocus>

                </div>

                <div class="mb-2">

                    <label>email:</label>
                    <input type="email" name="email" class="form-control" required>

                </div>

                <?php
                if(isset($_SESSION['email_err'])){

                    echo "<div class='text-danger'>{$_SESSION['email_err']}</div>";
                    unset($_SESSION['email_err']);
                }
                ?>

                <div class="mb-2">

                    <label>Miasto:</label>
                    <input type="text" name="city" class="form-control" required>

                </div>

                <div class="mb-2">

                    <label>Ulica:</label>
                    <input type="text" name="street" class="form-control" required>

                </div>

                <button class="btn btn-outline-success btn-block" type="submit">Potwierdz dane</button>
            </form>


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
