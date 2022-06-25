<?php
session_start();

if($_SESSION['admin_is_logged'] != true){

    header('Location: index.php');
    exit();
}

require_once 'database.php';

$changeCom = $db->prepare('UPDATE comments SET comment = :newComent WHERE id = :id');

$changeCom->bindValue(':id',$_GET["comment_id"] );
$changeCom->bindValue(':newComent',$_POST['com'] );
$changeCom->execute();

header("Location: product_page.php?id={$_GET['id']}");
