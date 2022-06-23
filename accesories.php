<?php 

$title = "Аксессуары | Интернет-магазин NG7";
require "header.php" ?>
    <!-- Header  -->
    <header class="header">
        <div class="container">
            <h1 class="hero-title">
              Аксессуары для 
              CHINT NG7 
             </h1>
             <p class="hero-text">
              Аксессуары используются для подключения распределительных устройств и внешних цепей, а также для
              обеспечения безопасности и надежности <br>электрической изоляции.
             </p>
        </div>
       
    </header>
    <!-- end Header -->

    <!-- Catalog -->
    <section class="catalog pb-5">
        <div class="container">
            <h2 class="pt-5 pb-3 mb-5">Аксессуары и вспомогательные компоненты</h2>
            <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2 g-4 cards-grid">
                <?php foreach($accessories_array as $item):?>
                    <div class="col">
                      <div class="card shadow h-100 border-0">
                        <div class="card-image">
                            <a href="product.php?id=<?php echo $item['id']?>"><img src="<?php echo $item['image_1']?>" class="card-img-top" alt="product-image"></a>   
                        </div>
                       
                        <div class="card-body">
                          <h5 class="card-title text-white"><?php echo $item['name'] ?></h5>
    
                          <div class="d-flex justify-content-between align-items-center pt-2">
                            <p class="card-text text-white fs-5 fw-bold">
                            <?php if($item['price'] == 0):?>
                                Цена по запросу
                            <?php else:?>
                                от <?php echo number_format($item['price'] , 0, ',', ' ');?> ₽
                            <?php endif?>
                        </p>
                            <a href="product.php?id=<?php echo $item['id']?>" class="card-btn">Подробнее</a>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                <?php endforeach;?>
               
                  
                
              
            </div>
        </div>
    </section>
    <!-- end Catalog -->

<?php require "footer.php" ?>