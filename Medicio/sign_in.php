<?php
	require "connection.php";
	$conn = connect();

	if (isset($_POST['type']))
	{
		$type = $_POST['type'];
		$user = $_POST['user'];
		$pwd  = $_POST['password'];

		// Run query
		$result = mysqli_query($conn, "select * from USERS WHERE phone = '$user' AND passkey = '$pwd' AND who = '$type';");

		if ($result && $result->num_rows > 0)
		{
			session_start();
			$_SESSION['user'] = $user;
			
			if($type == 'Patient'){header("Location: patient.php");}
			else{ if($type == 'Doctor'){header("Location: doctor.php");}}
		}
		else
		{
			echo "<script>alert('Invalid username/password combination.')</script>";
		}
	}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign In</title>
  
  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(1.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}


.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}



.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: green;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 4px;
	color: white;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: bold;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
	background: red;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}

#select_type{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;	
}

.sign_up{
	font-family: arial;
	font-size: 2em;
	font-weight: bold;
	padding: 6px;
	color: red;
}

.sign_up:hover{
	font-family: arial;
	font-size: 2em;
	font-style: italic;
	padding: 6px;
	color: green;
}

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body background-image="1.jpg">
  <div class="body"></div>
		<div class="grad"></div>
		<div class="header" style="position:relative;left:630px; top:155px;">
		<div style="color:red; font-size:55px;"><b>Log</b><span style="color:yellow; font-size:55px;"><b> In</b></span></div>
		</div>
		<br>
		<form class="login" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
				<input type="text" placeholder="username" name="user" required><br>
				<input type="password" placeholder="password" name="password" required><br>
				<select id="select_type" name="type" required>
					<option id="Doctor" value="Doctor">Doctor</option>
  					<option id="Patient" value="Patient">Patient</option>
				</select><br><br>
				<input type="submit" value="Login" name="submit">
			<h4>
				<a href="sign_up.php" class="sign_up">Sign Up</a>
			</h4>
		</form>
  		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>
