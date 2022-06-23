<?php 
require "dashboardHeader.php";


// Search product by any field functionality

$query = "SELECT * FROM `schema_types_stock`";
$result = $db->connection->query($query);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['update_schema_type_info'])){
        $db->connection->query("UPDATE `schema_types_stock` SET `info` = '{$_POST['schema_type_info']}' WHERE `schema_types_stock`.`id` = {$_POST['schema_type_id']};");
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}


?>
<div class="container-fluid">
  <div class="row">
    
    <main class="ms-sm-auto col-lg-12 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Изменить наличие схем</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        
          
        </div>
      </div>
      <div class="table-responsive pt-3 pb-5">
        <table class="table table-striped table-hover table-sm pt-3" cellspacing="0">
          <thead style="position: sticky;top: 0" class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Схема</th>
                    <th scope="col">Тип Схемы</th>
                    <th scope="col">В наличии</th>
                    <th scope="col">Доп. текст (Рекомендуется около 20 символов)</th>
                </tr>
            </thead>
          <tbody>
            <?php
            
                // Integrated with product search system
                while($item = mysqli_fetch_array($result)){
                    
                    if ($item['in_stock'] == 1){
                       echo '
                        <tr>
                            <td class="align-middle">' . $item['id'] . '</td>
                            <td class="align-middle">' . $product->getProductById($item['schema'])[0]['name'] . '</td>
                            <td class="align-middle">' . $item['type'] . '</td>
                            <td class="align-middle"><input type="checkbox" class="mycheckbox" name="change_stock" checked value="'. $item['id'] .'"></td>
                            <td class="align-middle"><form method="post"><input type="hidden" name="schema_type_id" value="'. $item['id'] .'"><input type="text" name="schema_type_info" value="'. $item['info'] .'"><button type="submit" name="update_schema_type_info" class="btn btn-primary" style="margin-left: 2rem">Изменить</button></form></td>
                        </tr>
                        '; 
                    } else {
                        echo '
                        <tr>
                            <td class="align-middle">' . $item['id'] . '</td>
                            <td class="align-middle">' . $product->getProductById($item['schema'])[0]['name'] . '</td>
                            <td class="align-middle">' . $item['type'] . '</td>
                            <td class="align-middle"><input type="checkbox" class="mycheckbox" name="change_stock" value="'. $item['id'] .'"></td>
                            <td class="align-middle"><form method="post"><input type="hidden" name="schema_type_id" value="'. $item['id'] .'"><input type="text" name="schema_type_info" value="'. $item['info'] .'"><button type="submit" name="update_schema_type_info" class="btn btn-primary" style="margin-left: 2rem">Изменить</button></form></td>

                        </tr>
                        '; 
                    }
                    
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
      $('.table-striped').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/ru.json"  
        },
        "pagingType": "numbers",  
        "aaSorting": [],
        columnDefs: [
        {
            orderable: false,
            targets: [0, 1, 2, 3]
        }]
      });
      $('.dataTables_length').addClass('bs-select');
    });
    
    
    $('.mycheckbox').change(function(e){
        // Get row id or whatever you need to relate it to info in the DB
        rowid = $(e.target).attr('value');
        isChecked = $(e.target).is(':checked');
        data = {id: rowid, active: isChecked};
        
        $.ajax({
            url: './actions/updateStock.php',
            method: 'POST',
            dataType: 'json',
            data: data
            
        });
        
        
    });
</script>