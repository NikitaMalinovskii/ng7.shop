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

// Product object
$product = new Product($db);

$id = $_GET['id'];

$product->deleteProduct($id);

header('Location: ../dashboard.php');