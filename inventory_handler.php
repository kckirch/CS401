<?php

    require_once 'Dao.php';
    $dao = new Dao();

    #handler is causing issue where the text is not being passed into dao.php, inventory.php looks to be okay unless it is improperly taking in payload in forms,
    $Brand = $_POST['Brand'];
    $Model = $_POST[`Model`];

    $dao->insertInventory($Brand, $Model, $_POST[`Colorway`], $_POST[`Size`], $_POST[`RetailPrice`], $_POST[`SalePrice`], $_POST[`StyleCode`], $_POST[`ItemCondition`], $_POST[`Notes`]);

    
    header('Location: inventory.php');
    exit;
 
?>
    