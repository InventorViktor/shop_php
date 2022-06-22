<?php
session_start();

    if(isset($_POST['name'])
        && isset($_POST['email'])
        && isset($_POST['password'])
        && isset($_POST['password_2']))
    {

        $all_is_ok = true;

        $name = htmlspecialchars($_POST['name']);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = htmlspecialchars($_POST['password']);
        $password_2  = htmlspecialchars($_POST['password_2']);

        require_once 'database.php';

        if(strlen($name)<3 || strlen($name) > 20){

            $all_is_ok = false;
            $_SESSION['name_err'] = "Imie powinno mieć co najmniej 3 litery i maksimum 20. Wybierz inne";
        }


        //email check
        if(empty($email)){

            $_SESSION['email_err'] = "niepoprawny email";
            $all_is_ok = false;
        } else {

            $alreadyExist = $db->prepare('SELECT name FROM users WHERE id=:id');
            $alreadyExist->bindValue(':id', $email);
            $alreadyExist->execute();

            if($alreadyExist->rowCount() > 0){

                $_SESSION['email_is_taken'] = "Już istnieje konto z tym email!";
                $all_is_ok = false;
            }
        }

        if($password != $password_2){

            $_SESSION['password_err'] = 'Podane hasła nie są identyczne';
            $all_is_ok = false;
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        if($all_is_ok == false){

            header("Location: register_page.php");
            exit();
        } else {

            $addUser = $db->prepare("INSERT INTO users VALUES(NULL,
                                                         :name,
                                                         :email,
                                                         :password)");

            $addUser->bindValue(':name', $name);
            $addUser->bindValue(':email', $email);
            $addUser->bindValue(':password', $password_hash);

            $addUser->execute();

            header('Location: welcome_page.php');
            exit();
        }

    } else {
        header("Location: index.php");
    }