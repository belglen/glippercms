<?php
	include 'inc/config.php';
	session_start();						
	$username = mysqli_real_escape_string($connectie, $_POST['username']);
						
	$getuser = mysqli_query($connectie, "SELECT id,username,password FROM users WHERE username = '$username'");
	$user = mysqli_fetch_assoc($getuser);
	
	if (empty($_POST['username']))
	{
		header("Location: index.php?error=empty");
		exit;
	}
	elseif (empty($_POST['password']))
	{
		header("Location: index.php?error=password");
		exit;	
	}
	elseif (mysqli_num_rows($getuser) == '0')
	{
		header("Location: index.php?error=noexist");
		exit;
	}
	elseif ($user['password'] != md5($_POST['password']))
	{
		header("Location: index.php?error=pwd");
		exit;
	}
	else
	{
		$_SESSION['id'] = $user['id'];
		$_SESSION['username'] = $user['username'];
		
		header('Location: me.php');
		exit;
	}
?>
