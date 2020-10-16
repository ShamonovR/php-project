
<?php 
session_start();
ini_set('display_errors', true);
?>
<?php
	 require "bd/connection.php"; 	
			$link->query("DELETE FROM users WHERE user_id = '".$_GET['id']."'");
            echo "<script> location.href='personal.php'; </script>";
            exit;
?>