<?php


   class Dao{

      public $dsn='mysql:dbname=rinventory;host=127.0.0.1';
      public $user="root";
      public $password="kckc";

      private function getConection(){
         try{
            $connection = new PDO($this->dsn, $this->user, $this->password);
         }
         catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
         }
         return $connection;
      }


      public function getInventory(){
         $connection = $this->getConection();

         try{
            $rows = $connection->query("select inv_num, Brand, Model, Colorway, Size, RetailPrice, SalePrice, StyleCode, ItemCondition, Notes from inventory", PDO::FETCH_ASSOC);
         }
         catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
         return $rows;
      }

   }


   
   


?>