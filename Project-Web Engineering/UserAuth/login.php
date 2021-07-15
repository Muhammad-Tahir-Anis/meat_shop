<?php 
session_start();

	include("..//DBL/connection.php");
	//include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where name = '$user_name'";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					header("Location: ../index.html");
					while($user_data = mysqli_fetch_assoc($result)){
						if($user_data['password'] == $password)
						{

							$_SESSION['user_id'] = $user_data['user_id'];
							header("Location: ../index.php");
							die;
						}
					}
				}
			}
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
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
				<li><a href="login.php">Login</a></li>
			</ul>
		</nav>
</header>


<div id="box">
		<form method="post">
			<div style="font-size: 30px;margin: 20px 20px 20px 110px;color: black; ">Login</div>
			<label >Username</label>
			<input id="text" type="text" name="user_name"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="password"><br><br>
			<a href="signup.php">SignUp For New Account</a><br><br>
			<input id="button" type="submit" value="Login"><br><br>	
		</form>
</div>

<footer>

</footer>
</body>
</html>