
<?php 
session_start();
ini_set('display_errors', true);
?>
<?php
	 require "bd/connection.php"; 	
			$link->query("DELETE FROM news WHERE news_id = '".$_GET['id']."'");
            echo "<script> location.href='index.php'; </script>";
            exit;
?>