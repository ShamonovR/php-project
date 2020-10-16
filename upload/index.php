
<?php
require_once 'connection.php'; // 
 ?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Responsive Vertical Timeline | CodyHouse</title>
</head>
<body>
	<header class="cd-main-header text-center flex flex-column flex-center">
    <h1>Новостная лента</h1>
    <div>
    </div>
    
  </header>

  <section class="cd-timeline js-cd-timeline">
    <div class="container max-width-lg cd-timeline__container">
    
      <?
            // $mysqli = new mysqli('localhost','vertical','root','root');
            if(mysqli_connect_errno()){ printf("Connect failed: %s\n", mysqli_connect_error()); exit(); }
            $query ="SELECT * FROM Gallery ";
            $result = mysqli_query($link, $query);
 
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo '
                <div class="cd-timeline__block">
                  <div class="cd-timeline__img cd-timeline__img--picture">
                    <img src="assets/img/cd-icon-picture.svg" alt="Picture">
                  </div> <!-- cd-timeline__img -->
                    <div class="cd-timeline__content text-component">
                      <h2>'.$row['id'].'</h2>
                        <p class="color-contrast-medium">'.$row['news'].'</p>
                        <div class="flex justify-between items-center">
                         <span class="cd-timeline__date">'.$row['data'].'</span>
                         <a href="#0" class="btn btn--subtle">Read more</a>
                        </div>
                      </div>
                   </div>';
            }
        ?>
    </div>
  </section> <!-- cd-timeline -->
  <script src="assets/js/main.js"></script>
</body>
</html>