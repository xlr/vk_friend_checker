<?php
session_start();

if($_SESSION['admin']){
	header("Location: index.php");
	exit;
}

$admin = 'admin';
$pass = '123';

if($_POST['submit']){
	if($admin == $_POST['user'] AND $pass == $_POST['pass']){
		$_SESSION['admin'] = $admin;
		header("Location: index.php");
		exit;
	}else echo '<p>Логин или пароль неверны!</p>';
}
?>

<form method="post">
	U: <input type="text" name="user" /><br />
	P: <input type="password" name="pass" /><br />
	<input type="submit" name="submit" value="Войти" />
</form>