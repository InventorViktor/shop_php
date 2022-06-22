<?php

    require_once 'database.php';

    $userComment = $db->prepare('SELECT users.name, comment FROM comments JOIN users where user_id=users.id and product_id= :id');

    $userComment->bindValue(":id", $_GET['id']);
    $userComment->execute();


    if(isset($_SESSION['is_logged'])){

        echo "<form method='post' action='add_comment.php?u_id={$_SESSION['is_logged']}&pr_id={$_GET['id']}'> " . '
                                    <textarea required name="comment" class="form-control mt-2 mb-2" placeholder="Dodaj swój komentarz"></textarea>
                                    <button type="submit" class="btn btn-outline-primary mb-3">Dodaj komentarz</button>
                              </form>';
    } else {

        echo '<p>Zaloguj się aby dodać komentarz</p>';
    }

    while ($commentRow = $userComment->fetch()){

        echo "<div class='card mt-1'>
                    
                    <div class='card-body'>
                    
                    <h5 class='card-title'>{$commentRow['name']}</h5>
                    <span class='card-text'>{$commentRow['comment']}</span> 
                    
                    </div>
                    
              </div>";
    }