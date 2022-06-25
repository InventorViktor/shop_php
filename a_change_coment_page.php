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
<?php
echo $_GET['comment_id'] . "<br>";
echo $_GET['id'] . "<br>";
echo"
<form action='a_change_coment.php?comment_id={$_GET['comment_id']}&id={$_GET['id']}'  method='post'>
    Nowy Komentarz:
    <input type='text' name='com'>
    <br> 

    <input type='submit'>
</form><br><br>";
?>
<a href="logout_admin.php">Wyloguj</a>
</body>
</html>
