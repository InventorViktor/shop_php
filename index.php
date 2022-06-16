<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cukierki</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <a href="#" class="nav-link"> Start</a> <!-- TODO: add href -->
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"> Kategorie</a> <!-- TODO: add href -->

                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="#"> Czekolady</a> <!-- TODO: add href x3 -->
                            <a class="dropdown-item" href="#"> Lizaki</a>
                            <a class="dropdown-item" href="#"> Żelki</a>

                        </div>

                    </li>

                </ul>

                <form class="form-inline m-auto"> <!-- TODO: add action and method -->

                    <input class="form-control mr-2 h-25" type="search" placeholder="Wyszukaj">
                    <button type="submit" class="btn btn-outline-light">Znajdź</button>

                </form>

                <a href="login.php" class="btn btn-outline-light button-margin" role="button">Zaloguj</a> <!-- TODO: add href -->

            </div>

        </nav>


    </header>

    <main>

        <div class="row">
            <?php
                require_once 'show_products.php';
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