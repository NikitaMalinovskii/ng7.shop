<?php require "header.php"?>
<?php
    
    // request post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['product_add_to_cart'])) {
            $Cart->addToCart($_POST['product_id']);
        }
    }
?>

    <!-- Header  -->
    <header class="header">
        <div class="container" id="main-title-container">
            <h1 class="hero-title">
                Комплектные распределительные устройства<br> с элегазовой изоляцией CHINT NG7 10, 20, 35 кВ 
             </h1>
             <p class="hero-text">
                 CHINT NG7 обеспечивают безопасную и надежную работу любой электроустановки. Продукты отвечают всем современнным требованиям: имеют малые габариты распределительных устройств, просты в обслуживании, имеют длительный срок эксплуатации.
             </p>
        </div>
    </header>
    <!-- end Header -->



    <!-- Catalog -->
    <section class="catalog pb-5">
        <div class="container">
            <div class="pt-5 mb-5 d-flex w-100 justify-content-between align-items-center flex-wrap">
                 <h2>Готовые решения схем NG7</h2>
                 <div class="main-button-group">
                     <button type="button" class="filter-button my-3 my-md-0" data-bs-toggle="modal" data-bs-target="#certModal">Сертификаты партнеров</button>
                    <button type="button" class="filter-button my-3 my-md-0" data-bs-toggle="modal" data-bs-target="#symbolModal">Условные обозначения</button>
                 </div>
                 
            </div>
            <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2 g-4 cards-grid">
              <?php foreach($schemas_array as $item): ?>
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
              <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- end Catalog -->

<?php require "footer.php";?>