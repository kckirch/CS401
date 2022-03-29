
<?php

session_start();
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']){
    header('Location: login.php');
        exit;
}

require_once 'Dao.php';
$dao = new Dao();
$inventorys = $dao->getInventory();  

?>



<html lang="en"></html>
<head>
    <title>Rinventory</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="inventoryBodyID">

    <header class="flex-header-1">
        <?php include "header.php"?>
        <span id="logout"><a href="logout.php">Logout</a></span>
    </header>

    <header class="flex-header-2">
        <?php include "nav.php"?>
    </header>

    <main class="flex-main">

        <nav class="left-sidebar">
            Your Top Items
            <hr>
        </nav>

        <article class="main-content">

            <div class="inventoryTitle">
                Your Inventory
            
                
                <form method="post" action="inventory_handler.php">

                    <div class="inventory_box">
                        <label>Brand</label>
                        <input type="text" id="brand" name="brand" required>
                    </div>

                    <div class="inventory_box">
                        <label>Model</label>
                        <input type="text" id="model" name="model" required>
                    </div>

                    <div class="inventory_box">
                        <label>Colorway</label>
                        <input type="text" id="colorway" name="colorway" required>
                    </div>

                    <div class="inventory_box">
                        <label>Size</label>
                        <input type="text" id="size" name="size" required>
                    </div>

                    <div class="inventory_box">
                        <label>Retail</label>
                        <input type="number" id="retailprice" name="retailprice" pattern="^[1-9]+[0-9]*$" required>
                    </div>

                    <div class="inventory_box">
                        <label>Resell</label>
                        <input type="number" id="saleprice" name="saleprice" pattern="^[1-9]+[0-9]*$" required>
                    </div>

                    <div class="inventory_box">
                        <label>Style Code</label>
                        <input type="text" id="stylecode" name="stylecode" required>
                    </div>

                    <div class="inventory_box">
                        <label>Condition</label>
                        <input type="text" id="itemcondition" name="itemcondition" required>
                    </div>

                    <div class="inventory_box">
                        <label>Notes</label>
                        <input type="text" id="notes" name="notes">
                    </div>


                    <input type="submit" value="Submit">
                </form>
            </div>

            <table id="inventorys">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Colorway</th>
                        <th>Size</th> 
                        <th>Retail</th>
                        <th>Resell</th>
                        <th>Style Code</th>
                        <th>Condition</th>
                        <th>Notes</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>


                <?php
                

                    #displays the inventory data as a table
                   
                    foreach ($inventorys as $inventory) {
                        
                        echo "<tr>";
                        echo "<td>" . ($inventory["inv_num"]) . "</td>";
                        echo "<td>" . ($inventory["Brand"]) . "</td>";
                        echo "<td>" . ($inventory["Model"]) . "</td>";
                        echo "<td>" . ($inventory["Colorway"]) . "</td>";
                        echo "<td>" . ($inventory["Size"]) . "</td>";
                        echo "<td>" . ($inventory["RetailPrice"]) . "</td>";
                        echo "<td>" . ($inventory["SalePrice"]) . "</td>";
                        echo "<td>" . ($inventory["StyleCode"]) . "</td>";
                        echo "<td>" . ($inventory["ItemCondition"]) . "</td>";
                        echo "<td>" . ($inventory["Notes"]) . "</td>";
                        echo "<td> <a href='delete_handler.php?id={$inventory['inv_num']}'>X</a> </td>";
                        echo "</tr>";
   
                    }
                   
                    echo"</table>";

                ?>
                </tbody>
            </table>




        </article>

        <aside class="right-sidebar">
            Up Coming Releases

            <hr>
            <br>
            another table will be used here to show the releases properly
        </aside>

    </main>

    <footer class="flex-footer">
        <?php include "footer.php"?>
    </footer>

</body>


</html>
