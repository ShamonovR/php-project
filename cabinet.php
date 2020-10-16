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




$sqlProd = mysqli_query($link,"SELECT user_id, user_login, user_surname, user_group, groups.name as namegroup from users inner join groups on users.user_group = groups.groups_id where user_id = '".($_COOKIE['id'])."' LIMIT 1");
$Prod= mysqli_fetch_array($sqlProd);
$id = $_COOKIE['id'];
?>
<!-- /SQL -->
<section>
   
   
   <div class="container md-5">
        <div class="row">

          

   <div class="container form-group ">
                <h4>Личный кабинет</h4><br/>
            <div class="col-lg-4">
                <div class="form-groups">
                    <?php if(isset($message)) { echo $message; } ?>
                    
                    <div class="container card">
  <img src="/img/img_avatar.png" alt="Аватар" style="width:100%">
  
    <center><h4>Surname: <b><?php echo $Prod['user_surname'];?></b></h4></center>
     <center><p>Roles : <b><?php echo $Prod['namegroup']; ?></b></p></center>
  </div>
</div> </br> <h4>Редактирование информации о себе</h4>
                    <form action="update_userBD.php" method="post" enctype="multipart/form-data">
                        <label for="formGroupExampleInput">Логин</label>
                        
                        <input type="hidden" name="user_id" class="txtField" value="<?php echo $Prod['user_id']; ?>">
    <input type="text" class="form-control" id="formGroupExampleInput" name="user_login" placeholder="" value="<?php echo $Prod['user_login'];?>" required>
                        <label for="formGroupExampleInput">Группа</label>
    <input type="hidden" name="user_group" class="txtField" value="<?php echo $Prod['user_group']; ?>">
        <input disabled type="text" class="form-control" id="formGroupExampleInput" name="user_group" placeholder="" value="<?php echo $Prod['namegroup'];?>" required>
       <br>


    <h6>Дополнительная информация</h6> <br>
                        <label for="formGroupExampleInput">Фамилия</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="user_surname" placeholder="" value="<?php echo $Prod['user_surname'];?>" required></br><br/>
<input type="submit" name="submit" value="Сохранить" class="btn btn-primary">
                 </div>
            <input type="hidden" name="id" value="<?php echo $_id['id']; ?>">
                      
    
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