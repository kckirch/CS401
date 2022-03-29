<?php

  require_once 'Dao.php';
  $dao = new Dao();
  
  $q->prepare($dao->deleteInventory($_GET['id']));
  $q->bindParam(":email", $email);
  $q->execute();
  
  header('Location: inventory1.php');
  exit;
  
?>