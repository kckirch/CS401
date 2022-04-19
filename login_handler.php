<?php


    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $_SESSION['email'] = $_POST['email'];
    
    require_once 'Dao.php';

    $dao = new Dao();
    
    $_SESSION['authenticated'] = $dao->userExist($email, $password);


    if ($_SESSION['authenticated']){
        
        header('Location: inventory1.php');
        exit;
    } else{
        
        
        header('Location: login.php');
        exit;
    }
    


