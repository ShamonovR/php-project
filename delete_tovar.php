
<?php 
session_start();
ini_set('display_errors', true);
?>

<?php
	 require "bd/connection.php"; 	
			$link->query("DELETE FROM tovar WHERE tovar_id = '".$_GET['id']."'");
            echo "<script> location.href='tovar.php'; </script>";
            exit;
?>
    