<?php

require "Product.php";

class Cart extends Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->connection)) return null;

        $this->db = $db;
    }
    
    //Insert item into cart
    public function insertItemIntoBundle($params = null)
    {
        
        // Find schema where we want to insert item
        $schema_id = 0;
        
        foreach($_SESSION['cart'] ?? [] as $key=>$value){
            if($value[1] == $params['schema_id']){
                $schema_id = $key;
                break;
            } 
        }
        
        // Insert
        if ($params != null) {
            $_SESSION['cart'][$schema_id][3][] = [
                $params['item_id'], 
                $params['quantity']
            ];
        }

        header('Location: ' . $_SERVER['PHP_SELF']);
    }

    // Insert schema into cart (start bundle) 
    public function insertSchemaIntoCart($params = null)
    {
        
        if ($params != null) {
            $_SESSION['cart'][] = [
                $params['schema_id'],
                $params['type'],
                $params['quantity'],
                $params['schema_items'],
            ];
        }

        header('Location: ' . $_SERVER['PHP_SELF']);
    }

    // Get item id and insert it into cart table
    public function addToCart($item_id, $type = null, $schema_items = null)
    {
        if (isset($item_id)) {
            
            $item = $this->getProductById($item_id)[0];
            
            if($item['type'] == schema){
                
                // Get data from user
                $params = array(
                    "schema_id" => $item_id,
                    "type" => $type,
                    "schema_items" => $schema_items,
                    "quantity" => 1,
                );
    
                // Insert data into cart
                $result = $this->insertSchemaIntoCart($params);
                
            } else {
                
                // Get data from user
                $params = array(
                    "item_id" => $item_id,
                    "schema_id" => $type, // in type we insert schema id
                    "quantity" => 1,
                );
                
                 // Insert data into cart
                $result = $this->insertItemIntoBundle($params);
                
            }
          

            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }


}
