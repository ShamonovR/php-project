<?php require "bd/connection.php" ?>
<?php

    $url = "docs/".$_FILES['doc']['name'];

    $sql = mysqli_query($link, "INSERT INTO docs(docs_name, docs_url)
     VALUES('".$_POST['name']."','".$url."')");

  if(is_uploaded_file($_FILES["doc"]["tmp_name"]))
   {
    $fileName=iconv ("utf-8","cp1251", $_FILES['doc']['name']);
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["doc"]["tmp_name"], "docs/".$fileName);
     echo "<script> alert('Файл успешно добавлен'); </script>";
      echo "<script> window.location.href = 'docs.php';</script>";
   } 
   
   
   else {
      echo("Ошибка загрузки файла");
   }
  

?>