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

$name = $_POST['name'];
$type = $_POST['type'];
$size = $_POST['size'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$info = $_POST['info'];
$description = $_POST['description'];
$features = $_POST['features'];
$image_1 = $_FILES['image_1'];
$image_2 = $_FILES['image_2'];
$image_3 = $_FILES['image_3'];
$product_id = $_POST['product_id'];

// If we don't want to change photos or want to change only one photo
if($_FILES['image_1']['name'] == ''){
    $image_1_path = $product->getProductById($product_id)[0]['image_1'];
} else {
    $path1 = "../../assets/img/products/" . $_FILES['image_1']['name'];
    move_uploaded_file($_FILES['image_1']['tmp_name'], $path1);
    $image_1_path = str_replace("../../", '', $path1);
}

if($_FILES['image_2']['name'] == ''){
    $image_2_path = $product->getProductById($product_id)[0]['image_2'];
} else {
    $path2 = "../../assets/img/products/" . $_FILES['image_2']['name'];
    move_uploaded_file($_FILES['image_2']['tmp_name'], $path2);
    $image_2_path = str_replace("../../", '', $path2);
}

if($_FILES['image_3']['name'] == ''){
    $image_3_path = $product->getProductById($product_id)[0]['image_3'];;
} else {
    $path3 = "../../assets/img/products/" . $_FILES['image_3']['name'];
    move_uploaded_file($_FILES['image_3']['tmp_name'], $path3);
    $image_3_path = str_replace("../../", '', $path3);
}


$product->editProduct($product_id, $name, $type, $size, $brand, $price, $info, $description, $features, $image_1_path, $image_2_path, $image_3_path);


header('Location: ../dashboard.php');