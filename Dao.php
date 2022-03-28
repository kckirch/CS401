<?php


   class Dao{

      public $dsn='mysql:dbname=rinventory;host=127.0.0.1';
      public $user="root";
      public $password="kckc";

      private function getConection(){
         try{
            $conn = new PDO($this->dsn, $this->user, $this->password);
         }
         catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
         }
         return $conn;
      }

      public function userExist($email, $password){
         $conn = $this->getConection();
         try{
            $q = $conn->prepare("select count(*) as total from loginform where user = :email and pass = :password");
            $q->bindParam(":email", $email);
            $q->bindParam(":password", $password);
            $q->execute();
            $rows = $q->fetch();

         }catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
         #for testing
         #echo print_r($rows,1);

         if ($rows['total'] == 1){
            return true;
         }else{
            return false;
         }
         

      }

      public function deleteInventory($inv_num){
         $conn = $this->getConection();

         $deleteQuery = "delete from inventory where inv_num = :inv_num";
         $q = $conn->prepare($deleteQuery);
         $q->bindParam(":inv_num", $inv_num);
         $q->execute();
      }


      public function insertInventory($Brand, $Model, $Colorway, $Size, $RetailPrice, $SalePrice, $StyleCode, $ItemCondition, $Notes){
      
         $conn = $this->getConection();
         try{


         $saveQuery = 
         
            "INSERT INTO inventory
            ( Brand, Model, Colorway, Size, RetailPrice, SalePrice, StyleCode, ItemCondition, Notes) 

            VALUES 

           
            (:Brand, :Model, :Colorway, :Size, :RetailPrice, :SalePrice, :StyleCode, :ItemCondition, :Notes)";
             #( '$Brand', '$Model', '$Colorway', '$Size', '$RetailPrice', '$SalePrice', '$StyleCode', '$ItemCondition', '$Notes')";

            
            #   going to leave dropable table in to test.            using '$varname' worked somehow so issue is with bindParam     when I try and use bindParam values the form will not send info
            #(:Brand, :Model, :Colorway, :Size, :RetailPrice, :SalePrice, :StyleCode, :ItemCondition, :Notes)";
      
         $q = $conn->prepare($saveQuery);

         $q->bindParam(":Brand", $Brand);
         $q->bindParam(":Model", $Model);
         $q->bindParam(":Colorway", $Colorway);
         $q->bindParam(":Size", $Size);
         $q->bindParam(":RetailPrice", $RetailPrice);
         $q->bindParam(":SalePrice", $SalePrice);
         $q->bindParam(":StyleCode", $StyleCode);
         $q->bindParam(":ItemCondition", $ItemCondition);
         $q->bindParam(":Notes", $Notes);
         $q->execute();
         }catch(Exception $e){
            echo print_r($e,1);
            exit;
         }

      }

      public function insertUser($email, $password){
         $conn = $this->getConection();
         try{
            $q = $conn->prepare("INSERT INTO loginform (user, pass) VALUES (:email, :password)");
            $q->bindParam(":email", $email);
            $q->bindParam(":password", $password);
            $q->execute();

         }catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
      }

      public function getInventory(){
         $conn = $this->getConection();

         try{
            $rows = $conn->query("select inv_num, Brand, Model, Colorway, Size, RetailPrice, SalePrice, StyleCode, ItemCondition, Notes from inventory", PDO::FETCH_ASSOC);
         }
         catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
         return $rows;
      }

   }

   #for testing if working
   #$dao = new Dao();


   #$dao->insertUser($_POST['email'], $_POST['password']);
   #$dao->insertInventory('Brand', 'Model', 'Colorway', 'Size', '100', '150', 'StyleCode', 'ItemCondition', 'Notes');

   #$dao->userExist('admin', 'admin');
   
   


?>