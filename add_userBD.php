<?php require "bd/connection.php" 
?>

<?php
$password = md5(md5($_POST['user_password']));
  //Если переменная Name передана
  if (isset($_POST["user_login"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `users` (`user_login`, `user_password`, `user_group`, `user_surname`) VALUES ('{$_POST['user_login']}', '$password', '{$_POST['user_group']}', '{$_POST['user_surname']}')");
    //Если вставка прошла успешно
    if ($sql) {
      echo "<script> alert('Данные успешно добавлены'); </script>";
      echo "<script> window.location.href = 'personal.php';</script>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }



 ?>