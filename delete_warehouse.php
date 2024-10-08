<?php
require_once 'classes/Warehouse.php';

if (isset($_GET['id'])) {
    $warehouse = new Warehouse();
    $warehouse->id = $_GET['id'];
    
    if ($warehouse->setInactive()) {
        header("Location: index.php");
    } else {
        echo "Error updating warehouse status.";
    }
}
?>
