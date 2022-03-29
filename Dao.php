<?php


   class Dao{
      //local login
      // public $dsn='mysql:dbname=rinventory;host=127.0.0.1';
      // public $user="root";
      // public $password="kckc";

      //heroku database
      private $dsn='mysql:dbname=heroku_56130100e745e40;host=us-cdbr-east-05.cleardb.net';
      private $user="b9cae243c7a38d";
      private $password="4082f1ae";

      public function getConection(){
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


      public function insertInventory($brand, $model, $colorway, $size, $retailprice, $saleprice, $stylecode, $itemcondition, $notes){
         $conn = $this->getConection();
         try{

            // $saveQuery = 
            //    "INSERT INTO inventory_table 
            //    (brand, model, colorway, size, retailprice, saleprice, stylecode, itemcondition, notes) 
            //    VALUES 
            //    (:brand, :model, :colorway, :size, :retailprice, :saleprice, :stylecode, :itemcondition, :notes)";
            // $q = $conn->prepare($saveQuery);

            //this is me making these identical to insertUser
            $q = $conn->prepare("INSERT INTO inventory_table
            (brand, model, colorway, size, retailprice, saleprice, stylecode, itemcondition, notes) 
            VALUES 
            (:brand, :model, :colorway, :size, :retailprice, :saleprice, :stylecode, :itemcondition, :notes)");



            $q->bindParam(":brand", $brand);
            $q->bindParam(":model", $model);
            $q->bindParam(":colorway", $colorway);
            $q->bindParam(":size", $size);
            $q->bindParam(":retailprice", $retailprice);
            $q->bindParam(":saleprice", $saleprice);
            $q->bindParam(":stylecode", $stylecode);
            $q->bindParam(":itemcondition", $itemcondition);
            $q->bindParam(":notes", $notes);
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
            $rows = $conn->query("select inv_num, brand, model, colorway, size, retailprice, saleprice, stylecode, itemcondition, notes from inventory_table", PDO::FETCH_ASSOC);
         }
         catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
         return $rows;
      }

   }

   #for testing if working
   // $dao = new Dao();
   // $dao->deleteInventory('92');
   // $dao->insertInventory('Test', 'Testing', 'ForceInsert', 'Big', '100', '150', 'Forced', 'Test', 'FromDao');

   #$dao->insertUser($_POST['email'], $_POST['password']);
   
   #$dao->insertInventory($_POST[`Brand`], $_POST[`Model`], $_POST[`Colorway`], $_POST[`Size`], $_POST[`RetailPrice`], $_POST[`SalePrice`], $_POST[`StyleCode`], $_POST[`ItemCondition`], $_POST[`Notes`]);


   #$dao->userExist('admin', 'admin');
   
   


?>