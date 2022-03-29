<?php

  require_once 'Dao.php';
  $dao = new Dao();
  
  $dao->deleteInventory($_GET['inv_num']);
  
  header('Location: inventory1.php');
  exit;
  
?>