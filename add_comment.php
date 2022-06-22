<?php

if(isset($_POST['comment']) && $_POST['comment'] != "") {

    require_once 'database.php';

    $text = filter_input(INPUT_POST, 'comment');

    $userComment = $db->prepare('INSERT INTO comments VALUES (NULL,
                                                                    :id,
                                                                    :text,
                                                                    :pr_id)');

    $userComment->bindValue(':id', $_GET['u_id']);
    $userComment->bindValue(':text', $text);
    $userComment->bindValue(':pr_id', $_GET['pr_id']);
    $userComment->execute();

    header("Location: product_page.php?id={$_GET['pr_id']}");
    exit();

} else {

    header("Location: index.php");
}

