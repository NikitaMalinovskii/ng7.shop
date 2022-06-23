<?php
ob_start();

$title = "Корзина | Интернет-магазин NG7";
require "header.php"; 

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['add-qty'])){
        $_SESSION['cart'][$_POST['product_cart_position']][2] = $_SESSION['cart'][$_POST['product_cart_position']][2] + 1;
        header('Location: ' . $_SERVER['PHP_SELF']);
        
    }
    if(isset($_POST['remove-qty'])){
        if($_SESSION['cart'][$_POST['product_cart_position']][2] > 1){
             $_SESSION['cart'][$_POST['product_cart_position']][2] = $_SESSION['cart'][$_POST['product_cart_position']][2] - 1;
             header('Location: ' . $_SERVER['PHP_SELF']);
             
        }
       
    }
    if(isset($_POST['item-add-qty'])){
        $_SESSION['cart'][$_POST['product_cart_position']][3][findSchemaItem($_POST['product_cart_position'], $_POST['schema_item_id'])][1] = $_SESSION['cart'][$_POST['product_cart_position']][3][findSchemaItem($_POST['product_cart_position'], $_POST['schema_item_id'])][1] + 1;
        header('Location: ' . $_SERVER['PHP_SELF']);
       
    }
    if(isset($_POST['item-remove-qty'])){
        if($_SESSION['cart'][$_POST['product_cart_position']][3][findSchemaItem($_POST['product_cart_position'], $_POST['schema_item_id'])][1] > 1){
             $_SESSION['cart'][$_POST['product_cart_position']][3][findSchemaItem($_POST['product_cart_position'], $_POST['schema_item_id'])][1] = $_SESSION['cart'][$_POST['product_cart_position']][3][findSchemaItem($_POST['product_cart_position'], $_POST['schema_item_id'])][1] - 1;
             header('Location: ' . $_SERVER['PHP_SELF']);
             
        }
       
    }
    if (isset($_POST['product_add_to_cart'])) {
              
        $Cart->addToCart($_POST['product_id'], $_POST['schema_type'], []);
        
        header('Location: ' . $_SERVER['PHP_SELF'] );
    }
}


?>
    <section class="cart py-5">
        <div class="container pt-5">
            <h1 class="pt-5">
                <?php //echo '<pre>'?>
                <?php //print_r($_POST) ?>
                <?php //echo '</pre>'?>
                Корзина
                <?php //echo '<pre>'?>
                <?php //print_r($schema_types) ?>
                <?php //echo '</pre>'?>
        
            </h1>
            <div class="row">
                <div class="col-lg-8 cart-grid">
                    
                    <ul class="cart-schema">
                        <?php if(count($_SESSION['cart'] ?? []) > 0): ?>
    						<?php
    						
    						    $cart_counter = 0;
    							foreach ($_SESSION['cart'] ?? [] as $item) :
    							    
    							    $cart_counter += 1;
        							$product_item = $product->getProductById($item[0])[0];
        							if($product_item['type'] == 'schema'){
        							     $schema_type = $product->getSchemaById($item[1])[0];
        							}
        							$product_quantity = $item[2];
        							$product_items = $item[3];
        							
        						
    						?>
    						    <?php if($product_item['type'] == 'schema'):?>
    						    <h4 class="my-5"><?php echo $cart_counter?>. Комплект базовой схемы <?php echo $schema_type['type']?></h4>
        							<li class="cart-item shadow">
                                        <div class="cart-item-content">
                                            <img src="<?php echo $product_item['image_1']?>" alt="product_image">
                                        </div>
                                        <div class="cart-item-text">
                                                <h5 class="cart-item-name">
                                                    <?php echo $product_item['name'] ?>
                                                </h5>
                                                <span class="cart-item-price">
                                                    <?php echo $schema_type['type']?> <?php if($schema_type['in_stock'] == 1):?>
                                                        (В наличии)
                                                    <?php else:?>
                                                        <?php if(empty($schema_type['info'])):?>
                                                            (Под заказ)
                                                        <?php else:?>
                                                            (<?php echo $schema_type['info']?>)
                                                        <?php endif?>
                                                    <?php endif ?>
                                                    <br>
                                                    от <?php echo number_format($product_item['price'] , 0, ',', ' ')?><span class="price d-none"><?php echo $product_item['price']?></span> ₽
                                                </span>
                                        </div>
                                        <div class="cart-item-controls">
                                            <form method="post">
                                                <div class="qty">
                                                    
                                                        <input type="hidden" name="product_cart_position" value="<?php echo findCartItemWithType($schema_type['id']) ?>">
                                                        <button type="submit" class="minus" name="remove-qty" ><i class="fa-solid fa-minus"></i></button>
                                                        <input type="number" class="count" name="qty" value="<?php echo $product_quantity?>">
                                                        <button type="submit" class="plus" name="add-qty" >+</button>
                                                    
                                                </div>
                                            </form>
                                            <form method="post">
        										<input type="hidden" value="<?php echo $schema_type['id'] ?>" name="product_id">
        										<button type="submit" class="bg-transparent text-danger border-0" name="delete-item-submit" style="font-size: 24px; padding-right: 2rem"><i class="fa-solid fa-circle-xmark"></i></button> 
        									</form>
                                        </div>
                                      
                                    </li>
                                    
                                    <h4 class="py-3" style="font-size: 18px">Доп. оборудование к схеме <?php echo $schema_type['type']?></h4>
                                    
                                    
                                        
                                            <?php foreach($product_items as $schema_item):?>
                                                
                                                <?php 
                                                    
                                                    $schemaItem = $product->getProductById($schema_item[0])[0];
                                                    $schemaItemQuantity = $schema_item[1];
                                                    
                                                ?>
                                                
                                                <li class="cart-item shadow" style="width: 85%;">
                                                    <div class="cart-item-content">
                                                        <img src="<?php echo $schemaItem['image_1']?>" alt="product_image">
                                                    </div>
                                                    <div class="cart-item-text">
                                                            <h5 class="cart-item-name">
                                                                <?php echo $schemaItem['name'] ?>
                                                            </h5>
                                                            <span class="cart-item-price">
                                                                <?php if($schemaItem['price'] != 0):?>
                                                                от <?php echo number_format($schemaItem['price'] , 0, ',', ' ')?><span class="price d-none">
                                                                    <?php echo $schemaItem['price']?>
                                                                    </span> ₽
                                                                <?php else: ?>
                                                                 Цена по запросу<span class="price d-none">
                                                                    0
                                                                    </span>
                                                                <?php endif?>
                                                            </span>
                                                    </div>
                                                    <div class="cart-item-controls">
                                                        <form method="post">
                                                            <div class="qty">
                                                                
                                                                    <input type="hidden" name="product_cart_position" value="<?php echo findCartItemWithType($schema_type['id']) ?>">
                                                                    <input type="hidden" name="schema_item_id" value="<?php echo $schemaItem['id']?>">
                                                                    <button type="submit" class="minus" name="item-remove-qty" ><i class="fa-solid fa-minus"></i></button>
                                                                    <input type="number" class="count" name="item-qty" value="<?php echo $schemaItemQuantity?>">
                                                                    <button type="submit" class="plus" name="item-add-qty" >+</button>
                                                                
                                                            </div>
                                                        </form>
                                                        <form method="post">
                    										<input type="hidden" name="product_cart_position" value="<?php echo findCartItemWithType($schema_type['id']) ?>">
                                                            <input type="hidden" name="schema_item_id" value="<?php echo $schemaItem['id']?>">
                    										<button type="submit" class="bg-transparent text-danger border-0" name="delete-schema-item-submit" style="font-size: 24px; padding-right: 2rem"><i class="fa-solid fa-circle-xmark"></i></button> 
                    									</form>
                                                    </div>
                                              
                                                </li>
                                            <?php endforeach ?>
                                       
                                            
                                            <div class="row">
                                           <?php if(str_contains($schema_type['type'], "V")):?> 
                                                <p>По умолчанию: Без доп. оборудования</p>
                                                <div class="col-lg-6 mt-3">
                                                
                                                    <form method="post" class="text-center">
                                                        <input type="hidden" name="schema_type" value="<?php echo $schema_type['id'] ?>">
                                                        <!--<input type="hidden" name="product_id" value="<?php //echo $protection['id'] ?>">-->
                                                        <select class="form-select" name="product_id" aria-label="Default select example" required> 
                                                          <option value="" selected disabled hidden>Выберите релейную защиту</option>
                                                          <?php foreach($protection_array as $protection):?>
                                                            <?php if(findSchemaItem(findCartItemWithType($schema_type['id']), $protection['id']) === NULL): ?>
                                                                <option value="<?php echo $protection['id']?>"><?php echo $protection['name'] ?>
                                                                
                                                                </option>
                                                            <?php else:?>
                                                                <option disabled class="text-white bg-info" value=""><?php echo $protection['name'] ?>
                                                                  - Добавлено
                                                                </option>
                                                            <?php endif ?>
                                                          <?php endforeach ?>
                                                         
                                                         </select>
                                                        <button type="submit"  name="product_add_to_cart" class="cta-btn w-50 mt-3">Добавить</button>
                                                    </form>
                                                          
                                            
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                
                                                    <form method="post" class="text-center">
                                                        <input type="hidden" name="schema_type" value="<?php echo $schema_type['id'] ?>">
                                                        <!--<input type="hidden" name="product_id" value="<?php //echo $protection['id'] ?>">-->
                                                        <select class="form-select" name="product_id" aria-label="Default select example" required> 
                                                          <option value="" selected disabled hidden>Выберите аксессуары</option>
                                                          <?php foreach($accessories_array as $protection):?>
                                                            <?php if(findSchemaItem(findCartItemWithType($schema_type['id']), $protection['id']) === NULL): ?>
                                                                <option value="<?php echo $protection['id']?>"><?php echo $protection['name'] ?>
                                                                  
                                                                </option>
                                                            <?php else:?>
                                                                <option disabled class="text-white bg-info" value=""><?php echo $protection['name'] ?>
                                                                  - Добавлено
                                                                </option>
                                                            <?php endif ?>
                                                          <?php endforeach ?>
                                                         
                                                         </select>
                                                        <button type="submit" name="product_add_to_cart" class="cta-btn w-50 mt-3">Добавить</button>
                                                    </form>
                                                          
                                            
                                                </div>
                                            
                                        
                                    <?php else: ?>
                                        <p>По умолчанию: Без доп. оборудования</p>
                                        <div class="col-lg-6 mt-3">
                                            <div class="alert alert-primary" role="alert">
                                              <i class="fa-solid fa-circle-info"></i> &nbsp; Релейная защита устанавливается только на функцию V, в выбранной схеме её нет
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                                
                                                    <form method="post" class="text-center">
                                                        <input type="hidden" name="schema_type" value="<?php echo $schema_type['id'] ?>">
                                                        <!--<input type="hidden" name="product_id" value="<?php //echo $protection['id'] ?>">-->
                                                        <select class="form-select" name="product_id" aria-label="Default select example" required> 
                                                          <option value="" selected disabled hidden>Выберите аксессуары</option>
                                                          <?php foreach($accessories_array as $protection):?>
                                                            <?php if(findSchemaItem(findCartItemWithType($schema_type['id']), $protection['id']) === NULL): ?>
                                                                <option value="<?php echo $protection['id']?>"><?php echo $protection['name'] ?>
                                                                  
                                                                </option>
                                                            <?php else:?>
                                                                <option disabled class="text-white bg-info" value=""><?php echo $protection['name'] ?>
                                                                  - Добавлено
                                                                </option>
                                                            <?php endif ?>
                                                          <?php endforeach ?>
                                                         
                                                         </select>
                                                        <button type="submit" name="product_add_to_cart" class="cta-btn w-50 mt-3">Добавить</button>
                                                    </form>
                                                          
                                            
                                                </div>
                                    <?php endif ?>
                                    </div>
                                <?php endif;?>
                                
    						<?php endforeach; ?>
    					<?php else: ?>
    						<p>Корзина пуста</p>
    					<?php endif; ?>
                        
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="subtotal mt-5 shadow p-4">
                        <div class="subtotal-text">
                            <h5>Ориентировочная стоимость товаров :</h5>
                            <div class="total-text">
                                <span class="total"></span> ₽
                            </div> 
                        </div>
                        <p class="mt-3">
                            Чтобы узнать точную стоимость оставьте заявку, 
наш менеджер проконсультирует вас в ближайшее время
                        </p>
                        <div class="subtotal-text">
                            <h5>Ваш заказ:</h5>
                        </div> 
                        <?php if(!empty($_SESSION['cart'])): ?>
                        <ul class="cart-items-list">
                           
                            
                            <?php 
                            $cart_item_counter = 0;
                            
                            foreach ($_SESSION['cart'] ?? []  as $item) :
                            
                                $cart_item_counter += 1;
                                $product_item = $product->getProductById($item[0])[0];
    							if($product_item['type'] == 'schema'){
    							     $schema_type = $product->getSchemaById($item[1])[0];
    							}
    							$product_quantity = $item[2];
    							$product_items = $item[3];
                            ?>
                                
                                <li><?php echo $cart_item_counter ?>. <?php echo $product_item['name'] ?><br><?php echo $schema_type['type']?> (<?php echo $product_quantity?> шт.)</li>
                                <?php foreach($product_items as $schema_item):?>
                                <?php endforeach?>
                            <?php endforeach ?>
                        </ul>
                        <?php else:?>
                         <p>Корзина пуста</p>
                        <?php endif?>
                        <button type="button" class="cta-btn mt-3 shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">Все верно, получить предложение</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<?php require "cart-footer.php";?>