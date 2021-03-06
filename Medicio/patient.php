<?php

	session_start();
	if (!isset($_SESSION['user'])){
		header("Location: home.php");
		exit();
	}

	require "connection.php";
	$conn = connect();
	$user = $_SESSION['user'];

	$query = "select * from patient where Contact = '$user'";
	$result = mysqli_query($conn, $query);

	$query = "select * from appoint where name_p = '$user';";
	$result2 = mysqli_query($conn, $query);

	$query = "select * from history where name_p = '$user';";
	$result3 = mysqli_query($conn, $query);

	if(!$result)
	{
		echo "<script>alert('Invalid username/password combination.')</script>";
		esit;
	}
	else

	{
		$row = $result->fetch_row();
		$final2 = '';

		if ($result2->num_rows > 0) {
		    while($row1 = $result2->fetch_row()) {
						$final2 .= " <tr><td> $row1[0] </td> <td> $row1[3] </td> <td> $row1[4] </td></tr> ";
			} 
		}
		else{
			$final2 = "<tr><td colspan = 3> NO DATA AVAILABLE </td><tr>";
		}

		if ($result3 && $result3->num_rows > 0) {
		    while($row2 = $result3->fetch_row()) {
						$final3 .= " <tr><td> $row1[1] </td> <td> $row1[2] </td> <td> $row1[3] </td></tr> ";
			} 
		}
		else{
			$final3 = "<tr><td colspan = 3> NO DATA AVAILABLE </td><tr>";
		}

		echo "
		<script> 
			window.onload = function(){
				document.getElementById('n').innerHTML = '$row[0]';
				document.getElementById('a').innerHTML = '$row[2]';
				document.getElementById('s').innerHTML = '$row[3]';
				document.getElementById('b').innerHTML = '$row[1]';
				document.getElementById('c').innerHTML = '$row[4]';
				document.getElementById('t').innerHTML = '$row[5]';
				document.getElementById('table_appoint').innerHTML += '$final2';
				document.getElementById('table_history').innerHTML += '$final3';
			}
		</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HMC - Health Care Management System</title>
	
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

	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<link id="t-colors" href="color/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


<div id="wrapper">
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left">Monday - Saturday, 8am to 10pm <?php echo $user; ?></p>
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

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
				<ul class="nav navbar-nav">
					<li class='active'><a href="#home">Home</a></li>
				  	<li><a href="#History">Medical History</a></li>
				  	<li><a href="#appointments">My appointments</a></li>
				  	<li><a href="#appointment">Book appointment</a></li>
					<li><a href="logout.php">Log out</a></li>
				</ul>
            </div>
        </div>
    </nav>
 </div>


	<section id="home">	
	<div class="intro-content">

		<div class="container home-section paddingtop-40">
			<div class="callaction bg-grey wow fadeInUp">

				<div class="row">
					<b>NAME : </b><i><p id="n"></p></i>
				</div>
				<div class="row">
					<b>AGE : </b><i><p id="a"></p></i>
				</div>
				<div class="row">
					<b>SEX : </b><i><p id="s"></p></i>
				</div>
				<div class="row">
					<b>BLOOD GROUP : </b><i><p id="b"></p></i>
				</div>
				<div class="row">
					<b>CONTACT NUMBER : </b><i><p id="c"></p></i>
				</div>
				<div class="row">
					<b>TYPE : </b><i><p id="t"></p></i>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="appointments">	
	<div class="intro-content">

		<div class="container home-section paddingtop-40">
			<div class="callaction bg-grey wow fadeInUp">

				<div class="row">
					<b><u><center> PENDING APPOINTMENTS </center></u></b>
				</div>
				<div class="row">
					<table id="table_appoint" border="2px" cellpadding="2%" cellspacing="2%" width="60%" align="center" style =  "text-align:center ">
						<tr>
							<th> DOCTOR NAME </th>
							<th> TIME </th>
							<th> DATE </th>
						</tr>			
					</table>
				</div>
			</div>
		</div>
		</div>
</section>

<section id="History">	
	<div class="intro-content">

		<div class="container home-section paddingtop-40">
			<div class="callaction bg-grey wow fadeInUp">

				<div class="row">
					<b><u><center> MY HISTORY </center></u></b>
				</div>
				<div class="row">
					<table id="table_history" border="2px" cellpadding="2%" cellspacing="2%" width="60%" align="center" style =  "text-align:center ">
						<tr>
							<th> DOCTOR NAME </th>
							<th> DATE </th>
							<th> REMARKS </th>
						</tr>			
					</table>
				</div>
			</div>
		</div>
		</div>
</section>


	<section id="appointment" class="home-section paddingtop-40">	
		<div class="intro-content">

           <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="callaction bg-gray">

							<div class="row">
								<div class="col-md-8">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<h3>In an emergency? Need help now?</h3>
									<p>If you want to see the doctor then please make an appointment to your doctor </p>
									</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wow lightSpeedIn" data-wow-delay="0.1s">
										<div class="cta-btn">
										<a href="patient_appointment.php" class="btn btn-skin btn-lg">Book an appoinment</a>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            </div>
	</section>	

	</div>

	<footer>
	
	
<a href="#page-top" class="scrollup"><i class="fa fa-angle-up active"></i></a>

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
