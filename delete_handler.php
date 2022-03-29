<?php

  require_once 'Dao.php';
  $dao = new Dao();
  
  $dao->deleteInventory($_GET['id']);
  
  header('Location: inventory1.php');
  exit;
  
?>