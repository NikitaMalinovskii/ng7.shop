<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap bundle-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!--Favicon-->
    <link rel="icon" href="assets/img/favicon.ico">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
     <style>
        table {
            font-size: 10px;
            
        }
        @media screen and (max-width: 500px){
            table {
                font-size: 4px;
                border-spacing: 2px;
            }
        }
        .table-bordered tr th{
          text-align: center;
          vertical-align: middle;
          color: white;
          background: #0166B3;
        }
        .table-bordered tr td:first-child {
          vertical-align: middle;
        }
        .table-bordered tr td:nth-child(2) {
          text-align: center;
          vertical-align: middle;
        }
        .table-bordered tr td:nth-child(3) {
          text-align: center;
          vertical-align: middle;
        }
        .table-bordered tr td:nth-child(4) {
          text-align: center;
          vertical-align: middle;
        }
        .table-bordered tr td:nth-child(5) {
          text-align: center;
          vertical-align: middle;
        }
        .table-bordered tr td:nth-child(6) {
          text-align: center;
          vertical-align: middle;
        }
        .table-bordered tr td:nth-child(7) {
          text-align: center;
          vertical-align: middle;
        }
        
        .slick-slide {
          margin: 20px;
        }
        
        .slick-arrow{
            width: 1px;
        }
        
        .slick-prev{
          left: 42%;
          margin-top: 7rem;
        }
        
        .slick-next{
          right: 46%;
          margin-top: 7rem;
        }
        
        
        .slick-prev:before {
          color: #0166B3;
          font-size: 30px;
        }
        
        .slick-next:before {
          color: #0166B3;
          font-size: 30px;
        }
        
      </style>
    <title><?php if (isset($title)) {echo $title;}
	else {echo "Каталог | Интернет магазин NG7";} ?></title>

    <?php require_once "functions.php"; ?>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete-item-submit'])) {
                // Function doesn't work so i decided to do it right here
                // And it's working!
                //
                // We search in session 'cart' array index of product what we want to delete
                // and delete it from session 'cart' array using unset()
                // after that redirect
                
                unset($_SESSION['cart'][findCartItemWithType($_POST['product_id'])]);
                header('Location: ' . $_SERVER['PHP_SELF']);
            }
            
            if (isset($_POST['delete-schema-item-submit'])) {
              
                
                unset($_SESSION['cart'][$_POST['product_cart_position']][3][findSchemaItem($_POST['product_cart_position'], $_POST['schema_item_id'])]);
                header('Location: ' . $_SERVER['PHP_SELF']);
            }
            
            
        }
        
       
    ?>
</head>
<body>

    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(88705415, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/88705415" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- dc-m.ru widgets--> 
<script>window.onload = function(){var widget_3fad0a4d = document.createElement('script');widget_3fad0a4d.src='//dc-m.ru/api-widget?userID=461&widgetID=3fad0a4d';document.head.appendChild(widget_3fad0a4d)};</script> 
<!-- dc-m.ru widgets END-->

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="index.php">
            <img src="assets/img/logo.svg" class="brand" width="150"></img></a>
        <div class="menu">
            <div class="btn">
                <i class="fas fa-times close-btn"></i>
            </div>
            <a href="index.php">Базовые схемы</a>
            <a href="releinaya-zashita.php">Релейная защита</a> 
            <a href="accesories.php">Аксессуары</a>
            <a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i> &nbsp;Корзина 
                <?php
                
                function echoCountWord($count){
                    if($count == 1){
                        echo 'схема';
                        return;
                    }
                    if($count > 1 && $count < 5){
                        echo 'схемы';
                        return;
                    }
                    if($count >= 5 || $count == 0){
                        echo 'схем';
                        return;
                    }
                }
                
                $menu_cart_counter = 0;
                
                foreach($_SESSION['cart'] ?? [] as $item){
                    $menu_cart_counter += 1;
                }
                    
                ?>
                
                (<?php echo $menu_cart_counter ?> <?php echoCountWord($menu_cart_counter) ?>)
                
                
            </a>
        </div>
        <div class="btn menu-btn">
            <i class="fas fa-bars"></i>
        </div>
        </div>
        
    </nav>
    <!-- end Navigation -->

