<?php
//need session to work

    require_once 'database.php';

    $userComment = $db->prepare('SELECT users.name, comments.id, comment FROM comments JOIN users where user_id=users.id and product_id= :id');

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
                    <span class='card-text mr-5'>{$commentRow['comment']}</span>";

                    if(isset($_SESSION['admin_is_logged'])){

                        echo "<a href='a_remove_coment.php?comment_id={$commentRow['id']}&id={$_GET['id']}' class='btn btn-outline-danger' onclick='removeComment()'>Usuń komentarz</a>";
                        echo "<a href='a_change_coment_page.php?comment_id={$commentRow['id']}&id={$_GET['id']}' class='btn btn-outline-info'>Zmień komentarz</a>";
                    }
                    
        echo        "</div>
                    
              </div>";
    }