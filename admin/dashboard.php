<?php 
require "dashboardHeader.php";


// Search product by any field functionality

$query = "SELECT * FROM `products`";
$result = $db->connection->query($query);




?>
<div class="container-fluid">
  <div class="row">
    
    <main class="ms-sm-auto col-lg-12 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Все товары</h1>
       
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-item.php" class="btn btn-sm btn-success">Добавить товар +</a>
            
          </div>
          
        </div>
      </div>
      <div class="table-responsive pt-3 pb-5">
        <table class="table table-striped table-hover table-sm pt-3" cellspacing="0">
          <thead style="position: sticky;top: 0" class="thead-light">
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Размер</th>
                    <th scope="col">Бренд</th>
                    <th scope="col">Цена</th>
                    <th scope="col">О товаре</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Характеристики</th>
                    <th scope="col">Изображение 1</th>
                    <th scope="col">Изображение 2</th>
                    <th scope="col">Изображение 3</th>
                    <th scope="col">Действия</th>
                    <th scope="col"></th>
                </tr>
            </thead>
          <tbody>
            <?php
            
                // Integrated with product search system
                while($item = mysqli_fetch_array($result)){
                    echo '
                    <tr>
                        
                        <td class="align-middle">' . $item['name'] . '</td>
                        <td class="align-middle">' . $item['type'] . '</td>
                        <td class="align-middle">' . $item['size'] . '</td>
                        <td class="align-middle">' . $item['brand'] . '</td>
                        <td class="align-middle">' . $item['price'] . '</td>
                        <td>' . mb_substr(htmlspecialchars($item['info'], ENT_QUOTES, 'UTF-8'), 0 , 100, 'UTF-8') . "..." . '</td>
                        <td>' . mb_substr(htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8'), 0 , 100, 'UTF-8') . "..." .'</td>
                        <td>' . mb_substr(htmlspecialchars($item['features'], ENT_QUOTES, 'UTF-8'), 0 , 100, 'UTF-8') . "..." .'</td>
                        <td class="align-middle" style="height: 100px; width: 150px"><img src="../' . $item['image_1'] . '" alt="product" style="height:100%; width:100%; object-fit:contain"></td>
                        <td class="align-middle" style="height: 100px; width: 150px"><img src="../' . $item['image_2'] . '" alt="product" style="height:100%; width:100%; object-fit:contain"></td>                       
                        <td class="align-middle" style="height: 100px; width: 150px"><img src="../' . $item['image_3'] . '" alt="product" style="height:100%; width:100%; object-fit:contain"></td>                       
                        
                        <td class="align-middle"> <a href="./edit-item.php?id='. $item['id'] .'" class="btn btn-primary">Изменить</a> </td>
                        <td class="align-middle"> <a href="./actions/DeleteItem.php?id='. $item['id'] .'" class="btn btn-outline-danger ">Удалить</a> </td>
                    </tr>
                    ';
                }
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
      $('.table').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/ru.json"  
        },
        "pagingType": "numbers",  
        "aaSorting": [],
        columnDefs: [
        {
            orderable: false,
            targets: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12]
        }]
      });
      $('.dataTables_length').addClass('bs-select');
    });
</script>