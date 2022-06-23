<?php 
ob_start(); // This line solves double adding item to cart
session_start();

require_once "functions.php";

$title = $product->getProductById($_GET['id'])[0]['name'] . ' | Интернет-магазин NG7';

require "header.php";



$product_item = $product->getProductById($_GET['id'])[0];


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Cart->addToCart($_POST['product_id'], $_POST['schema_type'], []);

    header('Location: ' . $_SERVER['PHP_SELF'] . "?id={$_POST['product_id']}" );

}

if($product_item['type'] == "schema"){
    $schema_types = $product->selectAllSchemaTypes($product_item['id']);
} else {
    $schema_types = [];
    
    foreach($_SESSION['cart'] as $item){
        $schema_types[] = [
            $item[0], // schema
            $item[1] // type of schema
        ];
    }
    
}



?>  

    
    <section class="product-section py-5">
        <div class="container pt-5">
            <nav aria-label="breadcrumb" class="pt-4">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="
                <?php 
                    switch($product_item['type']){
                        case 'schema':
                            echo 'index.php';
                            break;
                        case 'protection':
                            echo 'releinaya-zashita.php';
                            break;
                        case 'accessory':
                            echo 'accesories.php';
                            break;
                    }
                
                ?>">
                <?php 
                    
                    switch($product_item['type']){
                        case 'schema':
                            echo 'Базовые схемы';
                            break;
                        case 'protection':
                            echo 'Релейная защита';
                            break;
                        case 'accessory':
                            echo 'Аксессуары';
                            break;
                    }
                
                
                ?>
                </a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product_item['name'];?></li>
              </ol>
            </nav>
            <div class="row mt-5">
                <!-- Slider -->
                <div class="col-lg-6 product-slider">
                    <div id="carouselControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="<?php echo $product_item['image_1'];?>" alt="product-image">
                          </div>
                          <div class="carousel-item">
                            <img src="<?php echo $product_item['image_2'];?>" alt="product-image">
                          </div>
                          <div class="carousel-item ">
                            <img src="<?php echo $product_item['image_3'];?>" alt="product-image">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                <!-- end Slider -->
                <div class="col-lg-6 product-text">
                   <h2 class="mt-5">
                       <?php echo $product_item['name'];?>
                      
                       
                   </h2>

                   <h4 class="mt-3">
                            <?php if($product_item['price'] == 0):?>
                                Цена по запросу
                            <?php else:?>
                                от <span><?php echo number_format($product_item['price'] , 0, ',', ' ');?></span> ₽
                            <?php endif?>
                    </h4>
                  
                   <?php if($product_item['type'] == "schema"):?>
                     <h6 class="mt-5">Возможные типы:</h4>
    
                     <form action="#" method="post" class=" w-100">
                            <input type="hidden" name="product_id" value="<?php echo $product_item['id']; ?>">
                     <ul class="mt-3 p-0 d-flex flex-wrap">
                        <?php 
                        
                        $product_item_counter = 0;
                        foreach($schema_types as $type):
                            $product_item_counter += 1;
                        ?>
                            <li style="list-style-type: none; width: 50%;" class="mt-2">
                                <?php if (!in_array($type['id'], $_SESSION['cart'][findCartItemWithType($type['id'])] ?? [])): ?>
                                    <span class="<?php if($type['in_stock'] == 1) echo 'text-primary fw-bold' ?>">
                                        <label>
                                            <input type="radio" <?php if($product_item_counter == 1) echo 'required' ?> value="<?php echo $type["id"]?>" name="schema_type">
                                            &nbsp;
                                            
                                            <?php echo $type['type'] ?><br>
                                            <?php if($type['in_stock'] == 1):?>
                                                (В наличии)
                                            <?php else:?>
                                                 <?php if(empty($type['info'])):?>
                                                    (Под заказ)
                                                <?php else:?>
                                                    (<?php echo $type['info']?>)
                                                <?php endif?>
                                            <?php endif ?>
                                        </label>
                                    </span>
                                <?php else:?>
                                     <span class="text-success fw-bold">
                                        <label>
                                            <input type="radio" hidden <?php if($product_item_counter == 1) echo 'required' ?> value="<?php echo $type["id"]?>" name="schema_type">
                                            
                                            
                                            <?php echo $type['type'] ?><br>
                                            <?php if($type['in_stock'] == 1):?>
                                                (В наличии)
                                            <?php else:?>
                                                <?php if(empty($type['info'])):?>
                                                    (Под заказ)
                                                <?php else:?>
                                                    (<?php echo $type['info']?>)
                                                <?php endif?>
                                            <?php endif ?> - В корзине
                                        </label>
                                    </span>
                                <?php endif ?>
                                
                            </li>
                        <?php endforeach ?>
                     </ul>
                     <button type="submit" style="width: 40%" name="product_add_to_cart" class="cta-btn mt-3">В корзину</button>
                                
                    </form>
                   <?php endif ?> 
                  
                   <p class="mt-5">
                       <?php echo $product_item['info'];?>
                   </p>
                   
                </div>
            </div>
            <?php if($product_item['type'] != 'accessory'):?>
            <div class="row">
                <div class="col-lg-8 mt-5">
                    <ul class="nav nav-pills nav-fill border-bottom pb-3" id="myTab" role="tablist">
                        <li class="nav-item text-white" role="presentation">
                          <button class="nav-link active" id="product_desciption-tab" data-bs-toggle="tab" data-bs-target="#product_desciption" type="button" role="tab" aria-controls="product_description" aria-selected="true">Описание</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Характеристики</button>
                        </li>
                        <?php if($product_item['type'] == 'schema'):?>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="basic_functions-tab" data-bs-toggle="tab" data-bs-target="#basic_functions" type="button" role="tab" aria-controls="basic_functions" aria-selected="false">Описание базовых функций</button>
                            </li>
                        <?php endif ?>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="product_desciption" role="tabpanel" aria-labelledby="product_desciption-tab">
                            
                            <?php echo $product_item['description'];?>
                            <?php if($product_item['type'] == 'schema'):?>
                                <?php require "./components/schema_features.php"?>
                            <?php endif ?>
                            
                      
                            
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?php 
                            if($product_item['size'] != ''){
                                echo "<h5>Внешние размеры, Ш×Г×В: </h5>" . $product_item['size'] . " мм <br>";
                            }
                            ?>
                            <?php echo $product_item['features'];?>
                            <?php if($product_item['type'] == 'schema'):?>
                            <?php require "./components/schema_description.php"?>
                                <h5 class="my-5">Основные технические параметры</h5>
                                <button type="button" class="filter-button" data-bs-toggle="modal" data-bs-target="#tableModal">Открыть таблицу</button>
                            <?php endif ?>
                         
                        </div>
                        <?php if($product_item['type'] == 'schema'):?>
                            <div class="tab-pane fade" id="basic_functions" role="tabpanel" aria-labelledby="profile-tab">
                                 <?php require "./components/basic_functions.php" ?>
                            </div>
                        <?php endif ?>
                      </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </section>

<?php require "cart-footer.php" ?>