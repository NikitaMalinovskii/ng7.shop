<?php 

$title = "Релейная защита | Интернет-магазин NG7";
require "header.php" ?>
    <header class="header">
        <div class="container">
            <h1 class="hero-title">
                Релейная защита для CHINT NG7
             </h1>
             <p class="hero-text">
                Релейная защита осуществляет непрерывный контроль состояния всех элементов электроэнергетической системы и реагирует на возникновение повреждений и ненормальных режимов.
             </p>
        </div>
       
    </header>
    <!-- end Header -->

    <!-- Catalog -->
    <section class="catalog pb-5">
        <div class="container">
            <div class="pt-5 mb-5 d-flex w-100 justify-content-between align-items-center flex-wrap">
                 <h2>Виды релейной защиты</h2>
                 <div class="main-button-group">
                     <button type="button" class="filter-button my-3 my-md-0" data-bs-toggle="modal" data-bs-target="#certMttModal">Сертификаты партнеров</button>
                    
                 </div>
                 
            </div>
            
            <div class="button-group filters-button-group  d-none">
                  <button class="filter-button is-checked" data-filter="*">Все бренды</button>
                  <button class="filter-button" data-filter=".mtt">НПП «МП Технологии»</button>
                  <button class="filter-button" data-filter=".estra">НПП «ЭСТРА»</button>
                </div>
            <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2 g-4 cards-grid mt-3">
                <?php foreach($protection_array as $item):?>
                <div class="col <?php echo $item['brand']?>">
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