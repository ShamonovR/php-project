<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content ="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/stacktable.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script type="text/javascript" src="/js/stacktable.js"></script>
   
    <title>Учет товара</title>
    
</head>

  <script>
    function confirmDelete(id) {
      if (confirm("Вы точно хотите удалить этот товар?")) {
        location.href='delete_tovar.php?id='+id;
        return true;
      } else {
        return false;
      }
    }
  </script>
  
  <style type="text/css" media="print"> 
  div.no_print {display: none; } 
  @media print {
    table tr td {
     page-break-inside: avoid;
      page-break-after: always
    } 
</style> 
  
  
<?php require "blocks/header.php" ?>
<?php require "bd/connection.php" ?>

<body>
<div class="container">
    <div class="shapka no_print ">
         
         
         <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  >= 2 ){ 
                echo   ' <a class="create_tovar" href="add_tovar.php">
       <button type="button" class="knopka btn   btn-outline-primary">Добавить товар</button>
        </a>';
               
                    } 
                    else{ 
                echo   ''; 
                } ?>
         
         
         
   
     
        <a class="create_tovar">
        <button type="button" onclick="window.print()" class="knopka btn   btn-outline-primary">Перейти к печати</button>
        </a>
    
  <input class="form-control" id="myInput" type="text" placeholder="Поиск ...">
  </div>
  <br>
  <table class="table table-bordered table-striped" >
    <thead>
      <tr>
        <td>Категория</td>
        <td>Наименование</td>
        <td>Адрес</td>
        <td>Количество</td>
        <td>Стоимость</td>
        <td>Руководитель</td>
        
        
        
        <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  >= 3 ){ 
                echo   '<td>Изменить</td>';
                echo   '<td>Удалить</td>';
                    } 
                    else{ 
                echo   ''; 
                } ?>
        
        
        
        
      </tr>
    </thead>


    <tbody id="myTable">
      <tr>
       
 <?
         
            if(mysqli_connect_errno()){ printf("Connect failed: %s\n", mysqli_connect_error()); exit(); }
            //$query ="SELECT * FROM krug ORDER BY `name` ";
            $query ="SELECT tovar.tovar_id, tovar.tovar_name, tovar.tovar_price, tovar.tovar_kolvo, tovar.tovar_category, tovar.tovar_fio, Sklad.name as namesklad FROM tovar INNER join Sklad ON tovar.sklad_id = Sklad.sklad_id ORDER by tovar_id desc";
            $result = mysqli_query($link, $query);
 
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo '
                <tr>
        
       <td>'.$row['tovar_category'].'</td>
       <td>'.$row['tovar_name'].'</td>
       <td>'.$row['namesklad'].'</td>
       <td>'.$row['tovar_kolvo'].'</td>
       <td>'.$row['tovar_price'].'<i> р.</i></td>
       <td>'.$row['tovar_fio'].'</td>
      '?> 
      
      <?php if  ($userdata["user_group"]  >=3 ){ 
                echo   '<center><td><a href="update_tovar2.php?id='.$row['tovar_id'].'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-scissors" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm7 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>';
                echo   '<td><a href="#" onclick="return confirmDelete('.$row['tovar_id'].');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
</svg></a></td>';
                    } 
                    else{ 
                echo   ''; 
                } }?>
  
    </tbody>
  </table>
  
 
</div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php require "blocks/footer.php" ?>
     
     
<script>
jQuery(document).ready(function($) {
jQuery(function($){
$('table').stacktable();
});
});
</script>
</body>
</html>