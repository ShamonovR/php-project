
<?php 
session_start();
ini_set('display_errors', true);
?>

<?php
	 require "bd/connection.php"; 	
			$link->query("DELETE FROM docs WHERE docs_id = '".$_GET['id']."'");
            echo "<script> location.href='docs.php'; </script>";
            exit;
?>
    