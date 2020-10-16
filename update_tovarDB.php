<?php require "bd/connection.php" 
?>

<?php
 
    ini_set('display_errors',1);
if(count($_POST)>0) {
    //Вставляем данные, подставляя их в запрос
    mysqli_query($link, "
    UPDATE `tovar` SET 
    `tovar_category` = '{$_POST['tovar_category']}',
    `tovar_name` = '{$_POST['tovar_name']}',
    
    `tovar_kolvo` = '{$_POST['tovar_kolvo']}',
    `tovar_price` = '{$_POST['tovar_price']}',
    `tovar_fio` = '{$_POST['tovar_fio']}',
    `sklad_id` = '{$_POST['sklad_id']}'
    
    where `tovar_id` = '{$_POST['tovar_id']}'");
    
    
    //Если вставка прошла успешно
    if ($link) {
      echo "<script> alert('Данные успешно обновлены'); </script>";
      echo "<script> window.location.href = 'tovar.php';</script>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }



 ?>