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

?>
    <h2 class="mb-5">Добавить новый товар</h2>
    <form action="actions/AddItem.php" method="POST" enctype="multipart/form-data">
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
                    $input_label = 'Цена, от (Если цена 0, то выводится "Цена по запросу")';
                    break;
                case 'info':
                    $input_label = 'О товаре';
                    break;
                case 'description':
                    $input_label = 'Описание';
                    break;
                case 'features':
                    $input_label = 'Характеристики';
                    break;
                case 'image_1':
                    $input_label = 'Изображение 1';
                    break;
                case 'image_2':
                    $input_label = 'Изображение 2';
                    break;
                case 'image_3':
                    $input_label = 'Изображение 3';
                    break;
            }
            
            echo '

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">'. 
                
                
                $input_label
                
                .'</label>
                <input '. get_html_type($column->type, $column->name) .' class="form-control" name="'. 
                str_replace("product_", "",$column->name) 
                .'" required>
            </div>

            ';
        }
        ?>
        <button type="submit" class="btn btn-primary w-100 py-3 mt-3">Добавить товар</button>
    </form>
      <script>
            CKEDITOR.replace( 'info', {
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
            }  );
            CKEDITOR.replace( 'description' , {
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
            } );
            CKEDITOR.replace( 'features', {
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
            }  );
    </script>
</div>
