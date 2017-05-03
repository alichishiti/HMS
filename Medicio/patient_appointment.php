
<?php

	session_start();
	if (!isset($_SESSION['user'])){
		header("Location: home.php");
		exit();
	}
	require "connection.php";
	$conn = connect();
	$user = $_SESSION['user'];

	if (isset($_POST['submit']))
	{
		$d = $_POST['date'];
		$dd  = $_POST['doctor'];
		$tm = $_POST['time'];

		//echo $dd;
		$check_doctor = "select Contact from DOCTOR where Name_d = '$dd'";
		$result1 = mysqli_query($conn, $check_doctor);
		$result1 = $result1->fetch_row()[0];
		
		if($result1)
		{
		

			$check_doctor = "select timing from appoint where dating = '$d' and name_d = '$result1' and timing = '$tm'";
			$result2 = mysqli_query($conn, $check_doctor);
			$result2 = $result2->fetch_row()[0];

			if(!$result2){
				$check_doctor = "INSERT INTO APPOINT VALUES('$dd', '$result1', '$user', '$tm', '$d');";
				$result3 = mysqli_query($conn, $check_doctor);

				header("Location: patient.php");
				exit();
			}
			else{
				echo "<script> window.onload = function(){document.getElementById('validation').innerHTML = 'YOUR ENTERED TIME IS ALREADY RESERVED';} </script>";
			}
		}
		else{
			echo "<script> window.onload = function(){ document.getElementById('validation').innerHTML = 'YOUR DOCTOR DOES NOT EXIST'; }</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medicio landing page template for Health niche</title>
	
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet">
    
    <!-- =======================================================
        Theme Name: Medicio
        Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">Call us now +92 008 65 001</p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo.png" alt="" width="150" height="40" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="patient.php">Home</a></li>
				<li><a href="home.html">Log out</a></li>
			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>

	<!-- Section: intro -->

    <section id="intro" class="intro">
    <div class="intro-content">										<!-- SHOWS BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
								<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Make an appoinment </h3>
								</div>
								<div class="panel-body">
						            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
										<center><b><div class="row" id="validation" style="color: red"></div></b></center>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Enter Doctor's Name</label>
													<input type="text" name="doctor" required>
                                                </div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-9 col-sm-9 col-md-9">
												<div class="form-group">
													<label>Time (it must be between 8am to 10pm)</label>
													<input type="time" name="time" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Day of Appointment</label>
													<input type="date" name="date" required>
												</div>
											</div>
										</div>
										
										<p id="validation" style="color: red align: center"></p>
										<input type="submit" value="Submit" name="submit" class="btn btn-skin btn-block btn-lg">
										
										<p class="lead-footer">* We'll contact you by phone & email later</p>
										
										</form>
									</div>
								</div>				
							</div>
						</div>
					</div>					
				</div>		
			</div>
		</div>
    </section>
	
	<!-- /Section: intro -->

	
	


<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>	 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
    <script src="js/custom.js"></script>

    
</body>

</html>
