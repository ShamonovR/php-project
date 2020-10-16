<?php require "bd/connection.php" 
?>

<?php
  //Если переменная Name передана
  if (isset($_POST["tovar_name"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `tovar` (`tovar_name`, `tovar_price`, `tovar_fio`, `tovar_category`, `tovar_kolvo`, `sklad_id`) VALUES ('{$_POST['tovar_name']}', '{$_POST['tovar_price']}', '{$_POST['tovar_fio']}', '{$_POST['tovar_category']}', '{$_POST['tovar_kolvo']}', '{$_POST['sklad_id']}')");
    //Если вставка прошла успешно
    if ($sql) {
      echo "<script> alert('Данные успешно добавлены'); </script>";
      echo "<script> window.location.href = 'tovar.php';</script>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }



 ?>