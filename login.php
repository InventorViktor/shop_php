<?php
session_start();

    if(isset($_SESSION['is_logged']) || isset($_SESSION['admin_is_logged'])){

        header('Location: index.php');
        exit();
    }

    if(isset($_POST['login'])){

        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        require_once 'database.php';
        $userQuerry = $db->prepare('SELECT id, password FROM users WHERE email = :login');
        $userQuerry->bindValue(':login', $login);
        $userQuerry->execute();

        $result = $userQuerry->fetch();

        if($userQuerry->rowCount() == 1){

            if(password_verify($password, $result['password']) && $result['id'] == 1){

                $_SESSION['admin_is_logged'] = true;
                header('Location: index.php');
                exit();
            }
            elseif (password_verify($password, $result['password'])){

                $_SESSION['is_logged'] = $result['id'];
                header('Location: index.php');
                exit();
            } else {

                header('Location: login_page.php');
                $_SESSION['login_err'] = 'Login albo hasło jest niepoprawne';
                exit();
            }

        } else {

            header('Location: login_page.php');
            $_SESSION['login_err'] = 'Login albo hasło jest niepoprawne';
            exit();
        }

    } else {

        header('Location: login_page.php');
        exit();
    }


