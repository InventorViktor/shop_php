<?php
    session_start();

    if($_SESSION['admin_is_logged'] != true){

        header('Location: index.php');
        exit();
    }
    ?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>admin</title>
</head>
<body>

    <form action="a_add_product.php" method="post">
        Dodaj produkt: <br>
        nazwa produktu: <input type="text" name="name" required><br>
        cena: <input type="number" step=".01" name="price" required><br>
        ilość: <input type="number" name="amount" required><br>
        krótki opis: <input type="text" name="short_d" required><br>
        długi opis: <textarea name="long_d"></textarea><br>
        typ:
        <select name="type">
            <option value="baton">baton</option>
            <option value="lizak">lizak</option>
        </select>
        <br>

        <input type="submit">
    </form><br><br>

    <form action="a_remove_product.php" method="post">

        Usuń produkt:<br>

        Podaj id produktu:
        <input type="number" name="id" required><br>

        <input type="submit">
    </form><br>

    <a href="logout_admin.php">Wyloguj</a>
</body>
</html>
