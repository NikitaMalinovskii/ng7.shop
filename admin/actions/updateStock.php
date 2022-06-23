<?php 

session_start();

if($_SESSION['user']['role'] != 1){
    header('Location: ../index.php'); 
}

// Require database connection 
require_once '../../database/DBController.php';
require_once '../../database/classes/Product.php';

// DBController object
$db = new DBController(); 


$id = $_POST['id'];
$isChecked = $_POST['active'];

echo $id;
echo $isChecked;

if($isChecked == 'true'){
    $db->connection->query("UPDATE `schema_types_stock` SET `in_stock` = '1' WHERE `schema_types_stock`.`id` = {$id}");
    
} else {
    $db->connection->query("UPDATE `schema_types_stock` SET `in_stock` = '0' WHERE `schema_types_stock`.`id` = {$id}");
}


echo '<script>window.location="https://'.  $_SERVER['HTTP_HOST'] .'/admin/dashboardStock.php"</script>';