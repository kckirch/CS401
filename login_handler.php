<?php


    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'Dao.php';

    $dao = new Dao();
    
    $_SESSION['authenticated'] = $dao->userExist($email, $password);


    if ($_SESSION['authenticated']){
        header('Location: inventory.php');
        exit;
    } else{
        header('Location: login.php');
        exit;
    }

    // if (!$dao->userExist($email, $password)){
    //     echo "user not found";
    // } else{
    //     echo "user found";
    // }

