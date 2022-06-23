<?php
// Product Class 

class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->connection)) return null;

        $this->db = $db;
    }

    public function getColumnValues($table, $column){
        $result = $this->db->connection->query("SELECT `{$column}` FROM `{$table}`");

        $resultArray = array();

        // Fetch data from product table one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;

    }

    // Fetch product
    public function filterProductsByType($type)
    {
        $result = $this->db->connection->query("SELECT * FROM `products` WHERE type = '{$type}'");

        $resultArray = array();

        // Fetch data from product table one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function addProduct($name, $type, $size, $brand, $price, $info, $description, $features, $image_1, $image_2, $image_3){
        $this->db->connection->query("INSERT INTO `products` (`id`, `name`, `type`, `size`, `brand`, `price`, `info`, `description`, `features`, `image_1`, `image_2`, `image_3`) VALUES (NULL, '$name', '$type', '$size', '$brand', $price, '$info', '$description', '$features', '$image_1', '$image_2', '$image_3')");
    }                                   

    public function editProduct($product_id, $name, $type, $size, $brand, $price, $info, $description, $features, $image_1, $image_2, $image_3){
        $this->db->connection->query("UPDATE `products` SET `name` = '$name', `type` = '$type', `size` = '$size', `brand` = '$brand', `price` = '$price', `info` = '$info', `description` = '$description', `features` = '$features', `image_1` = '$image_1', `image_2` = '$image_2', `image_3` = '$image_3' WHERE `id` = $product_id");
    }

    public function deleteProduct($product_id){
        $this->db->connection->query("DELETE FROM `products` WHERE `id` = '$product_id'");
    }

    public function getColumnsFromTable($table){
        $result = $this->db->connection->query("SELECT * FROM `{$table}`");

        $resultArray = mysqli_fetch_fields($result);

        return $resultArray;
    }

    // Get product by id
    public function getProductById($id)
    {
        
        $result = $this->db->connection->query("SELECT * FROM `products` WHERE id = {$id}");
        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
        
    }
    
    // Select all schema tyypes
    public function getSchemaById($schema)
    {
       
        $result = $this->db->connection->query("SELECT * FROM `schema_types_stock` WHERE id = {$schema}");

        $resultArray = array();

        // Fetch data from product table one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
        
  
    }

    // Select all schema tyypes
    public function selectAllSchemaTypes($schema)
    {
        $result = $this->db->connection->query("SELECT * FROM `schema_types_stock` WHERE `schema` = {$schema}");

        $resultArray = array();

        // Fetch data from product table one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // Search product by name
    public function searchProductByName($product_name)
    {
        if (isset($product_name)) {
            $result = $this->db->connection->query("SELECT * FROM `products` WHERE product_name LIKE '%"."{$product_name}"."%'");
            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}
