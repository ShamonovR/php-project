
<?php 
session_start();
?>

<head>
    <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Добавление товара</title>
</head>
<?php 
  if ( !empty($_COOKIE['id'])) { 
include "bd/connection.php"; 
include "blocks/header.php"; ?>

           <div class="container form-group ">
                <h4>Добавить товар</h4>
            <div class="col-lg-4">
                <div class="form-groups">
                    <form action="add_tovarBD.php" method="post" enctype="multipart/form-data">
                        <label for="formGroupExampleInput">Категория</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="tovar_category" placeholder="Введите категорию товара" value="" required>
                        <label for="formGroupExampleInput">Название товара</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="tovar_name" placeholder="Введите название товара" value="" required>
                        <label for="formGroupExampleInput">Количество</label>
    <input type="number" min="0" max="1000" class="form-control" id="formGroupExampleInput" name="tovar_kolvo" placeholder="Его количество" value="" required>
                        <label for="formGroupExampleInput">Адрес склада</label>
    <select class="form-control form-group" id="formGroupExampleInput" name="sklad_id" placeholder="Выберите один из складов" value="" >
                <option value="1"> Варшавское шоссе 125 </option> 
                <option value="2"> Варшавское шоссе 124 </option> 

    </select>
    
                         <label for="formGroupExampleInput">Стоимость</label>
    <input type="number" class="form-control" id="formGroupExampleInput" name="tovar_price" placeholder="Введите его стоимость" value="" required>

                         <label for="formGroupExampleInput">Руководитель</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="tovar_fio" placeholder="Введите ФИО руководителя" value="" required>

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