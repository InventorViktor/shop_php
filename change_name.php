<?php
    session_start();
    if(!isset($_SESSION['is_logged'])){

        header("Location: index.php");
        exit();
    }

    require_once 'database.php';

    if (!isset($_POST['new_name'])){

        header("Location: user_options.php");
        exit();
    }

    $name = htmlspecialchars($_POST['new_name']);

    $newUserName = $db->prepare('UPDATE users SET name = :newName WHERE id = :id');

    $newUserName->bindValue(':newName', $name);
    $newUserName->bindValue(':id', $_SESSION['is_logged']);

    $newUserName->execute();
    $_SESSION['new_name'] = 'imię zostało zmienione na ' . $name ;

    header("Location: change_name_page.php");