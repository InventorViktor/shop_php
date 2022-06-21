<?php

    require_once 'database.php';

    $userComment = $db->prepare('SELECT users.name, comment FROM comments JOIN users where user_id=users.id and product_id= :id');

    $userComment->bindValue(":id", $_GET['id']);
    $userComment->execute();


    while ($commentRow = $userComment->fetch()){

        echo "<div class='card mt-1'>
                    
                    <div class='card-body'>
                    
                    <h5 class='card-title'>{$commentRow['name']}</h5>
                    <span class='card-text'>{$commentRow['comment']}</span> 
                    
                    </div>
                    
              </div>";
    }