<?php
session_start();
if(!isset($_SESSION['is_logged'])){

    header("Location: index.php");
    exit();
}

$name = htmlspecialchars($_POST['name']);
$surname = htmlspecialchars($_POST['surname']);
$email = htmlspecialchars($_POST['email']);
$city = htmlspecialchars($_POST['city']);
$street = htmlspecialchars($_POST['street']);

if(empty($email)){

    $_SESSION['email_err'] = "Podano zły email";
    header("Location: deliver_page.php");
    exit();
}

header("Location: delivery_page_end.php");