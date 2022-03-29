<?php

    require_once 'Dao.php';
    $dao = new Dao();

    #handler is causing issue where the text is not being passed into from inventory.php looks to be a post issue 
    $dao->insertInventory($_POST[`brand`], $_POST[`model`], $_POST[`colorway`], $_POST[`size`], $_POST[`retailprice`], $_POST[`saleprice`], $_POST[`stylecode`], $_POST[`itemcondition`], $_POST[`notes`]);
    header('Location: inventory1.php');
    exit;
 

    