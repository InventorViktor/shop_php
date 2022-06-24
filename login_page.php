<?php
session_start();

if(isset($_SESSION['is_logged'])){

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cukierki - login</title>

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

                    <li class="nav-item">
                        <a href="index.php" class="nav-link"> Start</a>
                    </li>

                </ul>

            </div>

        </nav>


    </header>

    <main>
        <section>

            <form style="max-width: 400px; margin: auto;" method="post" action="login.php">
                <div class="mb-3 mt-2 text-center">
                    <h1 class="h4">Zaloguj się</h1>
                </div>

                <div class="mb-2">

                    <label>Login:</label>
                    <input name="login" type="email" class="form-control" placeholder="Podaj email" required autofocus>

                </div>

                <div class="mb-4">
                    <label>Hasło:</label>
                    <input name="password" type="password" class="form-control" required>

                </div>

                <?php
                    if(isset($_SESSION['login_err'])){

                        echo "<span style='color: red;'>{$_SESSION['login_err']}</span>";
                        unset($_SESSION['login_err']);
                    }
                ?>

                <button class="btn btn-outline-success btn-block" type="submit">Zaloguj</button>
            </form>

            <div class="mt-3 text-center">
                Nie masz konta? <a href="register_page.php">Zarejestruj się</a>
            </div>

        </section>

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