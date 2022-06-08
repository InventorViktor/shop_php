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

            <form style="max-width: 400px; margin: auto;"> <!-- TODO: add action and method -->

                <div class="mb-3 mt-2 text-center">
                    <h1 class="h4">Zarejestruj się</h1>
                </div>

                <div class="mb-2">

                    <label>Imię:</label>
                    <input type="text" class="form-control" required autofocus>

                </div>

                <div class="mb-2">

                    <label>Nazwisko:</label>
                    <input type="text" class="form-control" required>

                </div>

                <div class="mb-2">

                    <label>email:</label>
                    <input type="email" class="form-control" required>

                </div>

                <div class="mb-2">

                    <label>Hasło:</label>
                    <input type="password" class="form-control" required>

                </div>

                <div class="mb-4">
                    <label>Powtórz hasło:</label>
                    <input type="password" class="form-control" required>

                </div>

                <button class="btn btn-outline-success btn-block" type="submit">Zarejestruj się</button>
            </form>

            <div class="mt-3 text-center">
                Masz już konto? <a href="login.php">Zaloguj się</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
