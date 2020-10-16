<?php 
session_start();
?>
<head>
    <meta charset="cp1251">
</head>

 


<?php
if ( !empty($_COOKIE['id'])) { 
include "bd/connection.php"; 
include "blocks/header.php";


$result = mysqli_query($link,"SELECT tovar.tovar_id, tovar.tovar_name, tovar.tovar_price, tovar.tovar_kolvo, tovar.tovar_category, tovar.tovar_fio, sklad_id from tovar where tovar_id ='".$_GET['id']."'");
$row= mysqli_fetch_array($result);
?>

<!-- /SQL -->
<section>
   
   
   <div class="container md-5">
        <div class="row">

          

            <h4>Редактировать товар</h4>
<br>
         

            <div class="col-lg-4">
                <div class="login-form">
   
   <form name="frmUser" method="post" action="update_tovarDB.php">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div class="form_group">
<label for="exampleInputEmail1">Категория</label>
<input type="hidden" name="tovar_id" class="txtField" value="<?php echo $row['tovar_id']; ?>">
<input class="form-control" type="text" name="tovar_category"  value="<?php echo $row['tovar_category']; ?>">
<br>
</div>
<div class="form_group">
<label for="exampleInputEmail1">Наименование</label>
<input class="form-control" type="text" name="tovar_name" class="txtField" value="<?php echo $row['tovar_name']; ?>">
<br>
 </div>
 
 <p>Адрес склада</p>
                       <form method="POST" action="">
                           


<? if ($row['sklad_id'] == 1) {
                            echo '<select class="form-control form-group" name="sklad_id" placeholder="" value="" >
                <option selected value="1">Варшавское шоссе 125</option> 
                <option value="2">Варшавское шоссе 124</option> 
               
                </select>';
                        }
                            if ($row['sklad_id'] == 2){
                                echo '<select class="form-control form-group" name="sklad_id" placeholder="" value="Пользователь" >
                <option value="1">Варшавское шоссе 125</option> 
                <option selected value="2">Варшавское шоссе 124</option> 
               
                </select>';
                            }
                           
                        ?>


                       
                        <div class="form_group">
                        <label for="exampleInputEmail1">Количество</label>
<input class="form-control" type="number" name="tovar_kolvo" min="0" max="1000" class="txtField" value="<?php echo $row['tovar_kolvo']; ?>">
<br>
</div>

  
  
                        <div class="form_group">
                        <label for="exampleInputEmail1">Цена</label>
<input class="form-control" type="text" name="tovar_price" class="txtField" value="<?php echo $row['tovar_price']; ?>">
<br>
 </div>
                        <div class="form_group">
                        <label for="exampleInputEmail1">Руководитель</label>
<input class="form-control" type="text" name="tovar_fio" class="txtField" value="<?php echo $row['tovar_fio']; ?>">
<br>
</div>
<input type="submit" name="submit" value="Сохранить" class="btn btn-primary">

</form>
   
   
   
   
   
   </div>
            </div>

        </div>
    </div>
</section>
   

<?php include 'blocks/footer.php'; ?>


  <?php 
  
  }
    else
    {
          echo "<script> alert('Необходимо авторизоваться!'); </script>";
          echo "<script> window.location.href = 'auth.php';</script>";
    } 

  ?>