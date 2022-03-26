
<?php

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
            Your Inventory
            <br>
            A table will go here
            <br>
            Item | Purchase Price | Sale Price | Notes
            

            <form method="POST" action="inventory_handler.php">
            <div class="inventory_box">
                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand">
            </div>

            <div class="inventory_box">
                <label for="style">Style:</label>
                <input type="style" id="style" name="style">
            </div>
                <input type="submit" value="Submit">
            </form>

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
                    </tr>
                </thead>
                <tbody>


                <?php

                    foreach ($inventorys as $inventory) {
                        
                        echo "<tr>

                            <td>{$inventory['inv_num']}</td>
                            <td>{$inventory['Brand']}</td>
                            <td>{$inventory['Model']}</td>
                            <td>{$inventory['Colorway']}</td>
                            <td>{$inventory['Size']}</td>
                            <td>{$inventory['RetailPrice']}</td>
                            <td>{$inventory['SalePrice']}</td>
                            <td>{$inventory['StyleCode']}</td>
                            <td>{$inventory['ItemCondition']}</td>
                            <td>{$inventory['Notes']}</td>
                            
                            </tr>";
                    }
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
