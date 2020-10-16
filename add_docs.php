
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
                <h4>Загрузить документ</h4>
            <div class="col-lg-4">
                <div class="form-groups">
            
                    
                   <form action="add_docsBD.php" method="post" enctype="multipart/form-data">
                        <p>Название документа</p>
                        <input type="text" name="name" placeholder="" value="" required>                        
                        <input type="file" name="doc" placeholder="" value="">                                                                       
                        <br/><br/>
                        <br/><br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
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