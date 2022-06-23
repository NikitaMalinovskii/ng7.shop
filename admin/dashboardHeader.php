<?php 
ob_start();
session_start();

if($_SESSION['user']['role'] != 1){
    header('Location: ../index.php'); 
}

// Require database connection 
require_once '../database/DBController.php';
require_once '../database/classes/Product.php';

// DBController object
$db = new DBController(); 

mysqli_set_charset($db->connection, "utf8");

// Product object
$product = new Product($db);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Панель администрирования | Интернет-магазин NG7</title>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          NG7 Администрирование
        </a>

        <ul class="nav col-12 col-lg-6 me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./dashboard.php" class="nav-link px-2 link-dark">Все товары</a></li>
          <li><a href="./dashboardStock.php" class="nav-link px-2 link-dark">Изменить наличие схем</a></li>
          
        </ul>

     

        <a class="btn btn-outline-danger" href="../database/Logout.php">Выйти из панели</a>
      </div>
    </div>
  </header>