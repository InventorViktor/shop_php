<?php
session_start();

    if(isset($_SESSION['admin_is_logged'])){

        header('Location: admin_page.php');
        exit();
    }

//    if(isset($_SESSION['is_logged'])){
//
//        header('Location: index.php');
//        exit();
//    }

    if(isset($_POST['login'])){

        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'password');;

        require_once 'database.php';
        $userQuerry = $db->prepare('SELECT id, password FROM users WHERE email = :login');
        $userQuerry->bindValue(':login', $login);
        $userQuerry->execute();

        $result = $userQuerry->fetch();

        echo $result['password'];
        echo $password;
        if($userQuerry->rowCount() == 1){

            if($result['password'] == $password && $result['id'] == 1){  //TODO : zamienić na password_verify jak będą w bazie hasła zahaszowane

                $_SESSION['admin_is_logged'] = true;
                header('Location: admin_page.php');
                exit();
            }
//            elseif ($result['password'] == $password){
//
//                $_SESSION['is_logged'] = true;
//                header('Location: index.php');    //TODO: USER LOGIN
//                exit();
//            }
            else{

                header('Location: login_page.php');
                exit();
            }
        }

    } else {

        header('Location: login_page.php');
       // $_SESSION['login_err'] =
        exit();
    }


