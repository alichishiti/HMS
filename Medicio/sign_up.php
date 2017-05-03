<?php
	require "connection.php";
	$conn = connect();

	if (isset($_POST['type']) && $_POST['type'] == 'Patient')
	{
		$n = $_POST['name'];
		$b  = $_POST['blood_group'];
		$c = $_POST['Contact_no'];
		$a  = $_POST['Age'];
		$s = $_POST['sex'];
		$p  = $_POST['password'];
		$t = $_POST['type'];


		// Run query
		$query1 = "INSERT INTO USERS VALUES('$c','$p' ,'$t')";
		$query2 = "INSERT INTO patient VALUES('$n','$b' ,'$a', '$s', '$c', '$t')";
		$result1 = mysqli_query($conn, $query1);
		$result2 = mysqli_query($conn, $query2);

		if ($result1 && $result2)
		{
			session_start();
			$_SESSION['user'] = $c;

			header("Location: patient.php");
		}
		else
		{
			echo "<script> window.onload = function(){document.getElementById('validation').innerHTML = 'THIS ID ALREADY EXISTS';} </script>";
		}
	}
	else{
		if (isset($_POST['type']) && $_POST['type'] == 'Doctor'){

			echo "<script> window.onload = function(){document.getElementById('validation').innerHTML = 'YOUR REQUEST HAS BEEN SENT';} </script>";
			header("Refresh: 5; url=sign_in.php");
		}
	}
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Create Account</title>
  
  
  
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
	border: 2px solid rgba(255,255,255,255);
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
	border: 2px solid rgba(255,255,255,255);
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
	background: black;
	border: 2px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: white;
	font-family: arial;
	font-size: 20px;
	font-weight: bold;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
	background-color: yellow;
	font-style: italic;
	color: red;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
	background-color: white;
	color: black;
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

.select_type{
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

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body background-image="1.jpg">
  <div class="body"></div>
		<div class="grad"></div>
		<div class="header" style="position:relative;left:630px; top:155px;">
			<div style="color:red; font-size:55px;"><b>Create</b><span style="color:yellow; font-size:55px;"><b> Account</b></span></div>
		</div>
		<br>
		
		<div style="position:relative; right:5%; top:300px;">
		<form class="login" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
				<input type="text" placeholder="Name" name="name" maxlength="10" required><br>
				<input type="text" placeholder="Blood Group" name="blood_group" maxlength="4"><br>
				<input type="text" placeholder="Age" name="Age" maxlength="3" required><br>
				<select class="select_type" required name="sex">
					<option id="sex" value="Male">Male</option>
  					<option id="sex" value="Female">Female</option>
				</select><br><br>
				<input type="text" placeholder="Contact no" name="Contact_no" maxlength="12" required><br>
				<input type="password" placeholder="password" name="password" maxlength="15" required><br>
				<select class="select_type" required name='type'>
					<option id="Doctor" value="Doctor">Doctor</option>
  					<option id="Patient" value="Patient">Patient</option>
				</select><br><br>
				<input type="submit" value="Create account" name="create"><p id="ans"></p><b><span id="validation"></span></b>
		</form>
		</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>
