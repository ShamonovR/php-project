<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content ="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/stacktable.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script type="text/javascript" src="/js/stacktable.js"></script>
   
	<title>Персонал</title>
	
</head>
  <script>
    function confirmDelete(id) {
      if (confirm("Вы точно хотите удалить этот документ?")) {
        location.href='delete_docs.php?id='+id;
        return true;
      } else {
        return false;
      }
    }
  </script>
  
  
  
<?php require "blocks/header.php" ?>
<?php require "bd/connection.php" ?>

<div class="container">
    <div class="shapka">
    
           <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  >= 2 ){ 
                echo   ' <a class="create_tovar" href="add_docs.php">
       <button type="button" class="knopka btn   btn-outline-primary">Добавить документ</button>
        </a>';
               
                    } 
                    else{ 
                echo   ''; 
                } ?>
       
        
        
       
    
  <input class="form-control" id="myInput" type="text" placeholder="Поиск ...">
  </div>
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
             <td>Наименование</td>
            <td>Скачать документ</td>
            
      
      <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  >= 3 ){ 
                echo   ' <a class="create_tovar">
                
                <td>Удалить документ</td>
        </a>';
               
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
  $query ="SELECT docs_id, docs_name, docs_url FROM docs";
  $result = mysqli_query($link, $query);
 
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo '
                <tr>
        
       <td>'.$row['docs_name'].'</td> '?>
       <?
         echo   '<center><td><a href="download.php?filename='.$row['docs_url'].'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
  <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
</svg>'; ?>

       
    <? if  ($userdata["user_group"]  >= 3 ){ 
                echo   '<td><a href="#" onclick="return confirmDelete('.$row['docs_id'].');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
jQuery(document).ready(function($) {
jQuery(function($){
$('table').stacktable();
});
});
</script>

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
     
     
   
</body>
</html>