<?php require "bd/connection.php" 
?>

<?php
 
    ini_set('display_errors',1);
if(count($_POST)>0) {
    //Вставляем данные, подставляя их в запрос
    mysqli_query($link, "
    UPDATE `users` SET 
    `user_login` = '{$_POST['user_login']}',
    `user_group` = '{$_POST['user_group']}',
    `user_surname` = '{$_POST['user_surname']}'
    where `user_id` = '{$_POST['user_id']}'");
    
    
    //Если вставка прошла успешно
    if ($link) {
      echo "<script> alert('Данные успешно обновлены'); </script>";
      echo "<script> window.location.href = 'personal.php';</script>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }



 ?>