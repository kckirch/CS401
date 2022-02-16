<html lang="en"></html>
<head>
    <title>Rinventory</title>
    <link rel="stylesheet" href="inventory.css">
</head>

<body>

<header class="flex-header-1">
        
        <img src="/art/headerLogo.png" alt="logo" />
        <hr>
    </header>

    <header class="flex-header-2">
        <div id="directory-Menu">
            <ul>
                <!-- these need to be href for each page -->
                <li>
                    <a href="/index.html">Home </a>   
                </li>
               <li>
                    <a href="/inventory.php">Inventory </a>
                </li>
               <li>
                    <a href="/login.php">Login </a>
                </li>
                <li>
                    <a href="/about.php">About </a>
                </li>
            </ul>
        </div>
    </header>

    <main class="flex-main">

        <nav class="left-sidebar">
            Your Top Items
            <hr>
        </nav>

        <article class="main-content">
            Your Inventory
            <br> <br>
            A table will go here
            <br><br>
            Item | Purchase Price | Sale Price | Notes
            <br><br>

            <?php
                
            ?>

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

            <table id="inventory">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Style</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $contents = file_get_contents("posted_inventory.txt");
                    $inventory_Lists = explode("\n", trim($contents));
                    foreach ($inventory_Lists as $inventory_List) {
                        list($brand, $style) = explode("|", trim($inventory_List));
                        echo "<tr><td>{$brand}</td><td>{$style}</td></tr>";
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
        FOOTER
    </footer>

</body>



    
        

    


</html>
