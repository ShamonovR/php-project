<?php require "bd/connection.php" 
?>

<?php
  //Если переменная Name передана
  if (isset($_POST["news_heading"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `news` (`news_id`, `news_new`, `news_data`, `news_heading`, `news_important`) VALUES ('{$_POST['news_id']}', '{$_POST['news_new']}', '{$_POST['news_data']}', '{$_POST['news_heading']}', '{$_POST['news_important']}')");
    //Если вставка прошла успешно
    if ($sql) {
      echo "<script> alert('Новость успешно добавлена'); </script>";
      echo "<script> window.location.href = 'index.php';</script>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }



 ?>