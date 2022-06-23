<?php require_once './dashboardHeader.php' ?>
<div class="container py-5">
<?php

$columns = $product->getColumnsFromTable('products');

// Remove register time and id field from array(send by default)
array_shift($columns);

// This function is default in PHP 8 but in PHP 7 you should write it manually
function str_contains($haystack, $needle) {
    return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}

function get_html_type($type, $name){
    if($type == 253){
        if(str_contains($name, 'image')){
            return 'type="file"';
        } else {
            return 'type="text"';
        }
    } else if ($type == 5){
        return 'type="number" step="0.01"';
    }
}


$id = $_GET['id'];

$item = $product->getProductById($id);


?>


    <h2 class="mb-5">Изменить товар: <?php echo $item[0]['name']?></h2>
    <form action="actions/EditItem.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?= $id ?>">
        <?php
        foreach($columns as $column){
            
            $input_label = '';
            
            switch ($column->name) {
                case 'name':
                    $input_label = 'Название';
                    break;
                case 'type':
                    $input_label = 'Тип (schema: схема, accessory: аксессуар, protection: релейная защита)';
                    break;
                case 'size':
                    $input_label = 'Размер (Ширина×Глубина×Высота)';
                    break;
                case 'brand':
                    $input_label = 'Бренд (для релейных защит важно: mtt - Микропроцессорные Технологии, estra - Эстра)';
                    break;
                case 'price':
                    $input_label = 'Цена, от (Если цена 0, то выводится "По запросу")';
                    break;
                case 'info':
                    $input_label = 'О товаре (Небольшой текст после цены)';
                    break;
                case 'description':
                    $input_label = 'Описание';
                    break;
                case 'features':
                    $input_label = 'Характеристики';
                    break;
                case 'image_1':
                    $input_label = 'Изображение 1 (Можно не менять, останется текущее изображение)';
                    break;
                case 'image_2':
                    $input_label = 'Изображение 2 (Можно не менять, останется текущее изображение)';
                    break;
                case 'image_3':
                    $input_label = 'Изображение 3 (Можно не менять, останется текущее изображение)';
                    break;
            }
            
            if($column->name == 'info' || $column->name == 'description'  || $column->name == 'features' ){
                
                echo '
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">'. 
                         $input_label
                        .'</label>
                        <textarea name="'. $column->name .'">' . $item[0][$column->name]   . '</textarea>
                        
                    </div>
                    
                ';
                
            } else {
                echo '
    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">'. 
                         $input_label
                        .'</label>
                        <input '. get_html_type($column->type, $column->name) .' class="form-control" name="'. 
                        $column->name .'" value="'.  $item[0][$column->name] .'" >
                        
                    </div>
        
                ';
            }
            
           
            
        }
        ?>
        <button type="submit" class="btn btn-primary w-100 py-3 mt-3">Изменить товар</button>
    </form>
     <script>
            CKEDITOR.replace( 'info', {
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
            } );
            CKEDITOR.replace( 'description', {
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
            }  );
            CKEDITOR.replace( 'features', {
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
            }  );
           
    </script>
</div>
