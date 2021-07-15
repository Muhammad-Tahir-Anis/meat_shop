<?php 
session_start();

	include("../DBL/connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) &&!empty($email) && !is_numeric($user_name))
		{

			//save to database
			//$user_id = random_num(20);
			$query = "insert into users (name,email,password) values ('$user_name','$email','$password')";

			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Sign Up</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style><?php include '../styles.css'; ?></style>
</head>
<body>

<header>
    <div id="title-container">
        <img src="../images/chicken.png" >
		<h3>Hajvairy Meat Shop</h3>
		<h5>Fresh-Halal-Doorstep</h5></div>
		<nav>
			<ul id="menu">
			<li><a href="../index.html#home">Home</a></li>
				<li><a href="../index.html#about">About Us</a></li>
				<li><a href="../index.html#product">Product</a></li>
				<li><a href="../index.html#deals">Deals</a></li>
				<li><a href="../index.html#contact">Contact</a></li>
				<li><a href="UserAuth/login.php">Login</a></li>
			</ul>
		</nav>
</header>
	

	<div id="box">
		
		<form method="post">
			<div style= "font-size: 30px;margin: 20px 20px 20px 90px;color: whiteSmoke;" >Signup</div>
			<label >Username</label>
			<input id="text" type="text" name="user_name"><br><br>
			<label>E-mail</label>
			<input id="text" type="email" name="email"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="password"><br><br>
			<a href="login.php">Back to Login</a><br><br>
			<input id="button" type="submit" value="Signup"><br><br>

			
		</form>
	</div>
	<footer>
	
</footer>
	
</body>
</html>