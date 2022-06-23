<?php

session_start();
if(!isset($_SESSION['is_logged'])){

    header("Location: index.php");
    exit();
}

require_once 'database.php';

$deleteUserComments = $db->prepare('DELETE FROM comments WHERE user_id = :id');
$deleteUserComments->bindValue(':id', $_SESSION['is_logged']);
$deleteUserComments->execute();

$deleteUser = $db->prepare('DELETE FROM users WHERE id = :id');
$deleteUser->bindValue(':id', $_SESSION['is_logged']);
$deleteUser->execute();

unset($_SESSION['is_logged']);
header("Location: index.php");