<?php
require_once 'classes/Warehouse.php';

if ($_POST) {
    $warehouse = new Warehouse();
    $warehouse->name = $_POST['name'];
    $warehouse->location = $_POST['location'];
    $warehouse->capacity = $_POST['capacity'];
    $warehouse->status = 'aktif';
    $warehouse->opening_hour = $_POST['opening_hour'];
    $warehouse->closing_hour = $_POST['closing_hour'];

    if ($warehouse->create()) {
        header("Location: index.php");
    } else {
        echo "Error adding warehouse.";
    }
}
?>
