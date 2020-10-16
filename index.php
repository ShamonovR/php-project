<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content ="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Панель управления</title>
    
</head>
<script>
</script>
 <script>
    function confirmDelete(id) {
      if (confirm("Вы точно хотите удалить эту новость?")) {
        location.href='delete_news.php?id='+id;
        return true;
      } else {
        return false;
      }
    }
  </script>
<style>
   .layer {
    overflow: scroll; /* Добавляем полосы прокрутки */
    width: 1085px; /* Ширина блока */
    height: 400px; /* Высота блока */
    padding: 5px; /* Поля вокруг текста */
    
   } 
  </style>

<?php require "blocks/header.php" ?>
<?
 if ( !empty($_COOKIE['id'])) { 
        echo ''; 
  }
    else
    {
        echo "<script> alert('Необходимо авторизоваться!'); </script>";
        echo "<script> window.location.href = 'auth.php';</script>";
    } 
?>



<div class="container">
    <br><br>
    <h5><?php

$morning = "Доброе утро!";
$day = "Добрый день!";
$evening = "Добрый вечер!";
$night = "Доброй ночи!";

$minyt = date("i");
$chasov = date("H");

if($chasov >= 04) {$hello = $morning;}
if($chasov >= 10) {$hello = $day;}
if($chasov >= 16) {$hello = $evening;}
if($chasov >= 22 or $chasov < 04) {$hello = $night;}

echo "Время: $chasov:$minyt, $hello"
?></h5>
        <b><?php
           
    $query = mysqli_query($link, "SELECT user_login FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
         echo "".$userdata['user_login']." ";
          ?> </b> !
           Вы: <b><?php
           
    $query = mysqli_query($link, "SELECT users.user_id, groups.name as namegroup FROM users inner join groups on users.user_group = groups.groups_id WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
         echo "".$userdata['namegroup']." ";
          ?>  </b>
          <br>
          
    <h7>Вам доступны такие возможности:</h7>
    <br><br>
    
    
<div class="card-deck mb-3 text-center ">
    <div class="card mb-4 shadow-sm col-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Учет товара</h4>
      </div>
      <div class="card-body">
      
         <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  == 1 ){ 
                echo   '   <ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр товара</li><br/>
         
        
        </a>';
               
                    } 
                    
                    
                     if  ($userdata["user_group"]  == 2 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр товара</li>
         <li>Добавление товара</li><br/><br/>
        
        </a'; } 
        if  ($userdata["user_group"]  == 3 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр товара</li>
         <li>Добавление товара</li>
         <li>Редактирование товара</li>
          <li>Удаление товара</li><br/>
        </a'; }
                
         if  ($userdata["user_group"]  == 4 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
        
         <li>ВСЕМОГУЩИЙ</li><br/>
        
        </a'; }
                       
               
                
                
                
               
      ?>
          
        </ul>
        <a href="tovar.php"><button type="button"  style="text-decoration: none; display: inline-block;" class="btn btn-lg btn-block btn-outline-primary">Войти</button></a>
      </div>
    </div>
       <div class="card mb-4 shadow-sm col-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Персонал</h4>
      </div>
      <div class="card-body">
        
          <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  == 1 ){ 
                echo   '   <ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр персонала</li><br/>
        
        
        </a>';
               
                    } 
                        if  ($userdata["user_group"]  == 2 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр персонала</li>
         <li>Добавление персонала</li><br/><br/>
        
        </a'; }
        
         if  ($userdata["user_group"]  == 3 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр персонала</li>
         <li>Добавление персонала</li>
         <li>Редактирование персонала</li>
         <li>Удаление персонала</li><br/>
        
        </a'; }
        
         if  ($userdata["user_group"]  == 4 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
        
         <li>ВСЕМОГУЩИЙ</li><br/>
        
        </a'; }?>
      
        </ul>
         <a href="personal.php"><button type="button" style="text-decoration: none; display: inline-block;" class="btn btn-lg btn-block btn-outline-primary">Войти</button></a>
      </div>
    </div>
        <div class="card mb-4 shadow-sm col-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Документы</h4>
      </div>
      <div class="card-body">
       
         <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  == 1 ){ 
                echo   '   <ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр документов</li>
         <li>Скачивание</li>
        
        </a>';
        
               
                    } 
                         if  ($userdata["user_group"]  == 2 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>Просмотр документов</li>
         <li>Скачивание документов</li>
         <li>Добавление документов</li><br/>
        
        </a'; }
        if  ($userdata["user_group"]  == 3 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
          <li>Просмотр документов</li>
         <li>Скачивание документов</li>
         <li>Добавление документов</li>
         <li>Удаление документов</li><br/>
        
        </a'; }
        if  ($userdata["user_group"]  == 4 ) {
                echo   '<ul class="list-unstyled mt-3 mb-4">
        <b><li>Описание функций</li></b>
         <li>ВСЕМОГУЩИЙ</li><br/>
         
        
        </a'; }
 
                
                ?>
      
        </ul>
         <a href="docs.php"><button type="button"  style="text-decoration: none; display: inline-block;" class="btn btn-lg btn-block btn-outline-primary">Войти</button></a>
      </div>
    </div>
    </div>
        </div>

<main role="main" class="container">
      <div class="shadow-lg p-3 mb-5 bg-secondary rounded">Новостная лента<svg width="1em" height="1em" style="width: 33px;" viewBox="0 0 16 16" class="bi bi-chat-left-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
</svg></style></div>

      </div>

 <?php 
        
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query); 
            if  ($userdata["user_group"]  >= 2 ){ 
                echo   ' <a class="create_tovar" href="add_news.php">
       <button type="button" class=" btn   btn-outline-primary">Добавить новость</button>
        </a>';
               
                    } 
                    else{ 
                echo   ''; 
                } ?>
      <div class="container layer my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Новости</h6>
        
        
      <?php 
       
        $query ="SELECT news_id, news_new, news_data, news_heading, news_important FROM news ORDER BY news_id DESC";
            $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      if  ($row["news_important"]  == 1 ) {
           echo '<div class=" media text-muted pt-3 alert alert-primary"><p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"> '.$row['news_heading'].'</strong>
            '.$row['news_new'].' 
            
            <a href="update_news.php?id='.$row['news_id'].'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-scissors" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm7 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
            
            <a href="#" onclick="return confirmDelete('.$row['news_id'].');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
</svg></a></style>
          </p></div>';
       } elseif ($row["news_important"]  == 2 ) { 
           echo '<div class=" media text-muted pt-3 alert alert-warning"><p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"> '.$row['news_heading'].'</strong>
            '.$row['news_new'].' 
            
            <a href="update_news.php?id='.$row['news_id'].'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-scissors" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm7 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
            
            <a href="#" onclick="return confirmDelete('.$row['news_id'].');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
</svg></a></style>
          </p></div>';
       } elseif ($row["news_important"]  == 3 ) { 
           echo '<div class=" media text-muted pt-3 alert alert-danger"><p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"> '.$row['news_heading'].'</strong>
            '.$row['news_new'].' 
            
            <a href="update_news.php?id='.$row['news_id'].'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-scissors" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm7 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
            
            <a href="#" onclick="return confirmDelete('.$row['news_id'].');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
</svg></a></style>
          </p></div>';
       }
       }
       ?>
      
       
      </div>


     
    
    

<?php require "blocks/footer.php" ?>
     
     
    </div>
  </footer>
</body>
</html>



