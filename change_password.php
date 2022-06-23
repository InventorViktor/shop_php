<?php
    session_start();
    if(!isset($_SESSION['is_logged'])){

        header("Location: index.php");
        exit();
    }

    require_once 'database.php';

    if (!isset($_POST['new_password'])){

        header("Location: user_options.php");
        exit();
    }

    $password = htmlspecialchars($_POST['new_password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $newUserName = $db->prepare('UPDATE users SET password = :newPassword WHERE id = :id');

    $newUserName->bindValue(':newPassword', $password_hash);
    $newUserName->bindValue(':id', $_SESSION['is_logged']);

    $newUserName->execute();
    $_SESSION['new_name'] = 'Hasło zostało zmienione';

    header("Location: change_name_page.php");