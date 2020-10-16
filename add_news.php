
<?php 
session_start();
?>

<head>
    <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Добавление новостей</title>
</head>
<?php 
  if ( !empty($_COOKIE['id'])) { 
include "bd/connection.php"; 
include "blocks/header.php"; ?>

           <div class="container form-group ">
                <h4>Добавить новой новости</h4>
            <div class="col-lg-4">
                <div class="form-groups">
                    <form action="add_newsBD.php" method="post" enctype="multipart/form-data">
                        <label for="formGroupExampleInput">Заголовок</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="news_heading" placeholder="Введите заголовок" value="" required>
                        <label for="formGroupExampleInput">Новость</label>
                         <p><textarea class="form-control" rows="10" cols="100" name="news_new"></textarea></p>

                       <label for="formGroupExampleInput">Важность</label>
    <select class="form-control form-group" id="formGroupExampleInput" name="news_important" placeholder="Выберите важность" value="" >
                <option value="1" class="alert alert-primary"> Не очень важно </option> 
                <option value="2" class="alert alert-warning"> Средняя важность</option> 
                <option value="3" class="alert alert-danger"> Важно</option> 
                        
    </select>
                 </div>
           
                      
                       <input type="submit" name="submit" value="Сохранить" class="btn btn-primary">
                        <br/><br/>
                    </form>
                    </div>
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