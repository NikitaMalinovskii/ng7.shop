 <!-- Footer With Form-->
    <footer class="footer py-5">
        <div class="container">
            <div class="footer-wrapper">
                <img src="assets/img/logo.svg" class="brand" width="150"></img>
                <div class="footer-menu">
                    <ul>
                        <h3>Меню</h3>
                        <li><a href="index.php">Каталог</a></li>
                        <li><a href="releinaya-zashita.php">Релейная защита</a></li>
                        <li><a href="accesories.php">Аксессуары</a></li>
                       
                    </ul>
                    <ul>
                        <h3>Сайт компании</h3>
                        <li><i class="fa-solid fa-globe"></i><a href="https://sibkomplekt.ru/">sibkomplekt.ru</a></li>
                        
                    </ul>
                    <ul>
                        <h3>Контакты</h3>
                        <li class="d-flex"><i class="fa-solid fa-location-dot"></i><span>
                            Россия, 656922, Алтайский край, 
                                <br>г. Барнаул, ул. Попова, 254В

                        </span>
                            </li>
                            <li class="d-flex"><i class="fa-solid fa-phone"></i><span>
                                <a href="tel:+73852539829">+7 (3852) 539-829</a>
                            </span>
                                </li>
                                <li class="d-flex"><i class="fa-solid fa-envelope"></i><span>
                                    <a href="mailto:company@sibkomplekt.ru">company@sibkomplekt.ru</a>
        
                                </span>
                                    </li>
                       
                    </ul>
                </div>
            </div>
            <div class="copyright-text text-muted mt-5">
                Полное или частичное копирование материалов без согласия их авторов запрещено. Несогласованное использование материалов сайта влечет за собой административную ответственность в виде компенсации в размере от 10 000 до 5 000 000 рублей (Ст. 1250, 1252, 1253, 1301 ГК РФ).
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-left">
                        <div class="modal-logo">
                            <img src="./assets/img/logo.svg" width="150" alt="">
                        </div>
                        <div class="modal-text">
                            <h2>Ваша корзина сохранена</h2>
                            <p>Заполните небольшую форму и узнайте точную стоимость заказа</p>
                        </div>
                        <div class="modal-contact">
                            <ul>
                                <h5>Контакты</h5>
                                <li>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>
                                        Россия, 656922, Алтайский край, 
                                        <br>г. Барнаул, ул. Попова, 254В
                                    </span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <span>
                                        <a href="tel:+73852539829" style="color:#FFF; text-decoration: none">+7 (3852) 539-829</a>
                                    </span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    <span>
                                        <a href="mailto:company@sibkomplekt.ru" style="color:#FFF; text-decoration: none">company@sibkomplekt.ru</a>
                                    </span>
                                </li>                           
                            </ul>
                        </div>
                    </div>
                    <div class="modal-right">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <form action="mail/SendMail.php" class="forms" method="post">
                            <div class="form">
                                <input type="text" name="name" autocomplete= "off" required>
                                <label class="label-hoshi" for="name">
                                    <span class="content-hoshi">
                                        Ваше имя
                                    </span>
                                </label>
                            </div>
                            <div class="form">
                                <input type="email" name="email" autocomplete="off" required>
                                <label class="label-hoshi" for="email">
                                    <span class="content-hoshi">
                                        Электронная почта
                                    </span>
                                </label>
                            </div>
                            <div class="form">
                                <input type="text" name="phone" autocomplete="off" required>
                                <label class="label-hoshi" for="phone">
                                    <span class="content-hoshi">
                                        Номер телефона
                                    </span>
                                </label>
                            </div>
                            <button class="cta-button shadow">
                                Отправить заявку
                            </button>
                        </div>
                        </div>
                       
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
    <div class="modal fade" id="tableModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0 p-lg-4">
                    <h5 class="modal-title" id="exampleModalLongTitle">Основные технические параметры</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <div class="modal-body">
                    
                    <?php require "./components/table.php" ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Slider-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/navbar.js"></script>
    <script>
        var navbar = document.querySelector(".navbar");
        navbar.classList.add('sticky');
        
        $('.cart-slider').slick({
          infinite: true,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                nav: false
              }
            }
          ]
        });
        
       
        
        
    
    </script>
   
    </body>
</html>