<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<?php session_start(); ?>
<!-- Start the session to carry over session variables -->
<!DOCTYPE html>
<html>
	<head>
		<!-- Link the common and specific resources -->
		<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
		<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
		<link rel="stylesheet" href="CancelBooking.css"> 
		<script type="text/javascript" src="CancelBooking.js"></script>
		<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>
		<title align="center">Speed Shop - Cancel Booking</title>
	</head>
	<!-- use checkDate to not allow the user to select a day before today -->
	<body onload="checkDate()">	
		<header>
			<a href="http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a>
		</header>
		<!-- Include Menubar and PHP files -->
		<hr>
		<?php include '../../Resources/PHP/menubar.php'; ?>
		<hr>
		<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>
		<?php include 'listBookings.php'; ?>
		<!-- If the file is sent back sucessfully then alert the user -->
		<?php
			if(ISSET($_POST['complete']))
			{
				echo "<script type='text/javascript'>alert(\"Congratulations, the booking with the ID of " . $_POST['returnid'] . " was cancelled\");</script>";
			}
			UNSET($_POST['complete']);
			UNSET($_POST['returnid']);
		?>
	    <div class="footer">Speed Shop 2017&reg;</div>
	</body>
</html>