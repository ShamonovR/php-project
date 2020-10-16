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


$result = mysqli_query($link,"SELECT users.user_id, users.user_login, users.user_group, users.user_surname FROM users where user_id ='".$_GET['id']."'");
$row= mysqli_fetch_array($result);
?>

<!-- /SQL -->
<section>
   
   
   <div class="container md-5">
        <div class="row">

          

   <div class="container form-group ">
                <h4>Редактировать пользователя</h4>
            <div class="col-lg-4">
                <div class="form-groups">
                    <?php if(isset($message)) { echo $message; } ?>
                    <form action="update_userBD.php" method="post" enctype="multipart/form-data">
                        <label for="formGroupExampleInput">Логин</label>
                        <input type="hidden" name="user_id" class="txtField" value="<?php echo $row['user_id']; ?>">
    <input type="text" class="form-control" id="formGroupExampleInput" name="user_login" placeholder="" value="<?php echo $row['user_login'];?>" required>
                        <label for="formGroupExampleInput">Группа</label>
                        
                        
                        
                        <? if ($row['user_group'] == 1) {
                            echo '<select class="form-control form-group" id="formGroupExampleInput" name="user_group" placeholder="" value="" >
                <option selected value="1">Пользователь</option> 
                <option value="2">Кладовщик</option> 
                <option value="3">Администратор</option> 
                <option value="4">Суперадмин</option> 
                </select>';
                        }
                            if ($row['user_group'] == 2){
                                echo '<select class="form-control form-group" id="formGroupExampleInput" name="user_group" placeholder="" value="Пользователь" >
                 <option value="1">Пользователь</option> 
                <option selected  value="2">Кладовщик</option> 
                <option value="3">Администратор</option> 
                <option value="4">Суперадмин</option> 
                </select>';
                            }
                            if ($row['user_group'] == 3) {
                                echo '<select class="form-control form-group" id="formGroupExampleInput" name="user_group" placeholder="" value="Пользователь" >
                  <option  value="1">Пользователь</option> 
                <option value="2">Кладовщик</option> 
                <option selected value="3">Администратор</option> 
                <option value="4">Суперадмин</option>  
                </select>';
                            }
                            if ($row['user_group'] == 4) {
                                echo '<select class="form-control form-group" id="formGroupExampleInput" name="user_group" placeholder="" value="Пользователь" >
                  <option  value="1">Пользователь</option> 
                <option value="2">Кладовщик</option> 
                <option value="3">Администратор</option> 
                <option selected value="4">Суперадмин</option> 
                </select>';
                            }
                        ?>
                        
                         

    <h6>Дополнительная информация</h6>
                        <label for="formGroupExampleInput">Фамилия</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="user_surname" placeholder="" value="<?php echo $row['user_surname'];?>" required>

                 </div>
           
                      
                       <input type="submit" name="submit" value="Сохранить" class="btn btn-primary">
                        <br/><br/>
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