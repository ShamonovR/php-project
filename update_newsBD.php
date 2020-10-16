<?php require "bd/connection.php" 
?>

<?php
 
    ini_set('display_errors',1);
if(count($_POST)>0) {
    //Вставляем данные, подставляя их в запрос
    mysqli_query($link, "
    UPDATE `news` SET 
    `news_id` = '{$_POST['news_id']}',
    `news_new` = '{$_POST['news_new']}',
    `news_data` = '{$_POST['news_data']}',
    `news_heading` = '{$_POST['news_heading']}',
    `news_important` = '{$_POST['news_important']}'
  
    
    where `news_id` = '{$_POST['news_id']}'");
    
    
    //Если вставка прошла успешно
    if ($link) {
      echo "<script> alert('Данные успешно обновлены'); </script>";
      echo "<script> window.location.href = 'index.php';</script>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }



 ?>