
    <!-- Footer -->
    <footer class="footer py-5">
      <div class="container">
          <div class="footer-wrapper">
              <img src="assets/img/logo.svg" class="brand" width="150"></img>
              <div class="footer-menu">
                  <ul>
                      <h3>Меню</h3>
                      <li><a href="index.php">Базовые схемы</a></li>
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
                              <li class="d-flex">
                                  <i class="fa-solid fa-envelope"></i><span>
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
    <div class="modal fade" id="symbolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header flex-wrap border-0 p-lg-4">
                    <h5 class="modal-title" id="exampleModalLongTitle">Условные обозначения</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img class="w-100 mt-5" style="object-fit: contain" src="./assets/img/symbol.png" alt="symbols">
                </div>
            </div>
        </div>
    </div>
    <!-- Table Modal -->
    <div class="modal fade" id="tableModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header flex-wrap border-0 p-lg-4">
                    <h5 class="modal-title" id="exampleModalLongTitle">Условные обозначения</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <?php require "./components/table.php" ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="certModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header flex-wrap border-0 p-lg-4">
                    <h5 class="modal-title" id="exampleModalLongTitle">Сертификаты партнеров</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img 
                     class="w-100 mt-5"
                     src="../assets/img/certificates/cert2.webp"
                     alt="Сертификат ООО 'Чинт Электрик'">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="certMttModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header flex-wrap border-0 p-lg-4">
                    <h5 class="modal-title" id="exampleModalLongTitle">Сертификаты партнеров</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img 
                     class="w-100 mt-4"
                     src="../assets/img/certificates/cert1.webp"
                     alt="Сертификат ООО 'НПП Микропроцессорные технологии'">
                </div>
            </div>
        </div>
    </div>
    <!-- end Footer -->
    <!--Jquery 3.6.0-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Isotope filtering-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Slider-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Custom JS-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/navbarScroll.js"></script>



</body>
</html>