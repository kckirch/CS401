<?php

    require_once 'Dao.php';
    $dao = new Dao();

    
    $dao->insertUser($_POST['email'], $_POST['password']);
    header('Location: login.php');
    exit;