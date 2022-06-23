<?php

// Require database connection 
require_once './database/DBController.php';
require_once './database/classes/Product.php';
require_once './database/classes/Cart.php';

// DBController object
$db = new DBController(); 

// Product object
$product = new Product($db);

// Cart object
$Cart = new Cart($db);

// Basic arrays
$schemas_array = $product->filterProductsByType('schema');
$protection_array = $product->filterProductsByType('protection');
$accessories_array = $product->filterProductsByType('accessory');


// Find which item contains product id as [0] => product_id
function findCartItem($id){
    foreach($_SESSION['cart'] ?? [] as $key=>$value){
        if($value[0] == $id){
            return $key;
            break;
        } 
    }
}

// Find which item contains product id as [1] => typeId (new version  of findCartItem)
function findCartItemWithType($typeId){
    foreach($_SESSION['cart'] ?? [] as $key=>$value){
        if($value[1] == $typeId){
            return $key;
            break;
        } 
    }
}

// Find which item contains product id as [0] => product_id
function findSchemaItem($schema_position, $itemId){
    foreach($_SESSION['cart'][$schema_position][3] ?? [] as $key=>$value){
        if($value[0] == $itemId){
            return $key;
            break;
        } 
    }
}


