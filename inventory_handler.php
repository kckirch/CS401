<?php
    file_put_contents("posted_inventory.txt", $_POST['brand'] . "|" . $_POST['style'] . "\n", FILE_APPEND | LOCK_EX);
    header('Location: inventory.php');
    exit;

    