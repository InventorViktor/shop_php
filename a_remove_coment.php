<?php
session_start();

if($_SESSION['admin_is_logged'] != true){

    header('Location: cukierki');
    exit();
}

require_once 'database.php';

$removeProduct = $db->prepare('DELETE FROM comments WHERE id = :id');

$removeProduct->bindValue(':id',$_GET["comment_id"] );
$removeProduct->execute();

header("Location: product_page.php?id={$_GET['id']}");
