
<?php 
session_start();
?>

<head>
    <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Добавление пользователей</title>
</head>
<?php 
  if ( !empty($_COOKIE['id'])) { 
include "bd/connection.php"; 
include "blocks/header.php"; ?>

           <div class="container form-group ">
                <h4>Добавить нового пользователя</h4>
            <div class="col-lg-4">
                <div class="form-groups">
                    <form action="add_userBD.php" method="post" enctype="multipart/form-data">
                        <label for="formGroupExampleInput">Логин</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="user_login" placeholder="Введите логин" value="" required>
                        <label for="formGroupExampleInput">Пароль</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="user_password" placeholder="Введите пароль" value="" required>
                        <label for="formGroupExampleInput">Группа</label>
    <select class="form-control form-group" id="formGroupExampleInput" name="user_group" placeholder="Выберите группу" value="" >
                <option value="1"> Пользователь </option> 
                <option value="2"> Кладовщик</option> 
              

    </select>
    <h6>Дополнительная информация</h6>
                        <label for="formGroupExampleInput">Фамилия</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="user_surname" placeholder="Введите фамилию" value="" required>

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