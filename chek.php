<?php session_start();?>
<?php require "bd/connection.php" ?>
<head><meta charset="utf8"></head>

	
<?php if ( !empty($_POST['Log']) and !empty($_POST['Pass'])) {
		//$sql = mysqli_query("SELECT count(*) FROM User where Login = '".$_POST['Log']."' and Password = '".$_POST['Pass']."'",$link);
$link->query("SELECT count(*) FROM User where Login = '".$_POST['Log']."' and Password = '".$_POST['Pass']."'");
	
		$row=mysqli_fetch_array($link);
		if ($row[0] > 0) {
			$_SESSION['logged'] = 1;
			$_SESSION['login'] = $_POST['Log'];
			echo "<script> alert('Добро пожаловать!'); </script>";
			echo "<script> window.location.href = 'index.php';</script>";	
		} 
		else {
			echo "<script> alert('Введенные вами данные не подходят!'); </script>";
			echo '<script> window.location.href = "auth.php";</script>';
		}
}
	if (!empty($_GET['logout'])){ // если юзер решил выйти
  unset($_SESSION['logged']);
  unset( $_SESSION['login']); // просто разрушаем переменные
  echo "<script> window.location.href = 'auth.php';</script>";	
  exit;
	}
	
	
	