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


      
      public function insertInventory($Brand, $Model, $Colorway, $Size, $RetailPrice, $SalePrice, $StyleCode, $ItemCondition, $Notes){
         
         
         $conn = $this->getConection();
         $saveQuery = 
         
            "INSERT INTO `inventory`
            ( Brand, Model, Colorway, Size, RetailPrice, SalePrice, StyleCode, ItemCondition, Notes) 


            VALUES 
            
            ( '$Brand', '$Model', Colorway, Size, RetailPrice, SalePrice, StyleCode, ItemCondition, Notes)";

            
            #   going to leave dropable table in to test.            using '$varname' worked somehow so issue is with bindParam     when I try and use bindParam values the form will not send info



            
            #(:Brand, :Model, :Colorway, :Size, :RetailPrice, :SalePrice, :StyleCode, :ItemCondition, :Notes)";
      
         $q = $conn->prepare($saveQuery);

         $q->bindParam(":Brand", $Brand);
         $q->bindParam(":Model", $Model);
         $q->bindParam(":colorway", $Colorway);
         $q->bindParam(":size", $Size);
         $q->bindParam(":RetailPrice", $RetailPrice);
         $q->bindParam(":SalePrice", $SalePrice);
         $q->bindParam(":StyleCode", $StyleCode);
         $q->bindParam(":ItemCondition", $ItemCondition);
         $q->bindParam(":Notes", $Notes);
         $q->execute();

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