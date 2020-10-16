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


$result = mysqli_query($link,"SELECT news_id, news_new, news_data, news_heading, news_important from news where news_id ='".$_GET['id']."'");
$row= mysqli_fetch_array($result);
?>

<!-- /SQL -->
<section>
   
   
   <div class="container md-5">
        <div class="row">

          

            <h4>Редактировать новость</h4>
<br/><br/>
         </div>

            <div class="col-lg-4">
                <div class="login-form">
   <div><?php if(isset($message)) { echo $message; } ?>
</div>
   <form name="frmUser" method="post" action="update_newsBD.php" enctype="multipart/form-data">

<div class="form_group">
 <label for="formGroupExampleInput">Заголовок</label>
 <input type="hidden" name="news_id" class="txtField" value="<?php echo $row['news_id']; ?>">
    <input type="text" class="form-control" id="formGroupExampleInput" name="news_heading"  value="<?php echo $row['news_heading']; ?>" required>

<br>
</div>
            <div class="form_group">
 <label for="formGroupExampleInput">Новость</label>
 <input type="hidden" name="news_new" class="txtField" value="<?php echo $row['news_new']; ?>">
    <input type="text" class="form-control" id="formGroupExampleInput" style="height: 200px; padding-bottom: 140px;" name="news_new"  value="<?php echo $row['news_new']; ?>" required>

<br>
</div>


<div class="form_group">
                                     <label for="formGroupExampleInput">Важность</label>
                                     <input type="hidden" name="news_impotrant" class="txtField" value="<?php echo $row['news_important']; ?>">
    <select class="form-control form-group" id="formGroupExampleInput" name="news_important" value="<?php echo $row['news_important']; ?>" >
                <option value="1" class="alert alert-primary"> Не очень важно </option> 
                <option value="2" class="alert alert-warning"> Средняя важность</option> 
                <option value="3" class="alert alert-danger"> Важно</option> 
                        
    </select>
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