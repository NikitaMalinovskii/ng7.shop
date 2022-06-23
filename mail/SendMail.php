<?php

    /*
    * Script which sends emails
    */ 


    session_start();

    // Database connection
    require_once '../database/classes/Product.php';
    require_once '../database/DBController.php';
    
    $db = new DBController();
    $product = new Product($db);

    // For invoice date
    date_default_timezone_set('Asia/Barnaul');

    // Template directories
    $template_file = "./MailTemplate.php";
    $product_template = "./MailProductTemplate.php";

    // Email settings
    $email_to = "fm.dige@yandex.ru,company@sibkomplekt.ru";
    $subject = "Новая заявка с интернет-магазина NG7";

    // Product item
    $product_item = "";

    
    $db->connection->query("SET NAMES utf8");
    
    $cart_subtotal = 0;
    
    // Fill invoice with session products
    foreach ($_SESSION['cart'] ?? [] as $item){
        
        // Item
        $cart = $product->getProductById($item[0])[0];
        
        $cart_quantity = $item[2];
        
        // Add basic function price to subtotal
        $cart_subtotal += $cart_quantity * $cart['price'];
        
        // Schema items array
        $schema_items_array = $item[3];
        
      
        
       
        if($cart['type'] == 'schema'){
            $cart_type = $product->getSchemaById($item[1])[0];
            
            $cart_type_modified = '';
            
            $product_schema_items = '';
            
            if(!empty($schema_items_array)){
                foreach($schema_items_array as $schema_item){
                    $schemaItem = $product->getProductById($schema_item[0])[0];
                    
                    $cart_subtotal += $schema_item[1] * $schemaItem['price'];
                    
                    $product_schema_items .= '<li>'. $schemaItem['name'] . ' (' . $schema_item[1] . ' шт) - ' . $schemaItem['price'] . 'р</li>';
                }
            } else {
                $product_schema_items .= 'Не выбрано';
            }
           
        
            
            if($cart_type[0]['in_stock'] == 1){
                $cart_type_modified = $cart_type['type'] . ' (В наличии)';
            } else {
                $cart_type_modified = $cart_type['type'] . ' (Под заказ)';
            }
            
            $swap_product = array(
                "{PRODUCT_TITLE}" => $cart['name'],  
                "{PRODUCT_DESCRIPTION}" => $cart_type_modified,
                "{PRODUCT_PRICE}" => $cart['price'],          
                "{PRODUCT_QUANTITY}" => $cart_quantity,          
                "{PRODUCT_SCHEMA_ITEMS}" =>  $product_schema_items,          
                "{PRODUCT_IMAGE}" => $cart['image_1'],          
            );
        }

        $product_item .= file_get_contents($product_template);

        foreach(array_keys($swap_product) as $key){
            if(strlen($key) > 2 && trim($key) != "")
                $product_item = str_replace($key, $swap_product[$key], $product_item);
        }
    }

    // Set variables in email template
    $swap_var = array(
        "{NAME}" => $_POST['name'],
        "{EMAIL}" => $_POST['email'],
        "{PHONE}" => $_POST['phone'],
        "{ORDER_DATE}" => date('m/d/Y h:i:s a', time()),
        "{PRODUCTS}" => $product_item,
        "{SUBTOTAL}" => $cart_subtotal,
    );

    // Headers
    $headers = "From: NG7 <info@ng7.shop>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";


    if(file_exists($template_file)){
        $message = file_get_contents($template_file);
    } else {
        die("unable to locate template");
    }

    // Swap variables in $swap_arr
    foreach(array_keys($swap_var) as $key){
        if(strlen($key) > 2 && trim($key) != "")
            $message = str_replace($key, $swap_var[$key], $message);
    }
    
    // Mail function
    mail($email_to, $subject, $message, $headers);


    // Redirect to index page
    header('Location: ../index.php');
    
    
