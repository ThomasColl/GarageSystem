<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Link the common and specific resources -->
		<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
		<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
		<link rel="stylesheet" href="NewInvoice.css"> 
		<script type="text/javascript" src="NewInvoice.js"></script>
		<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>
		<title align="center">Speed Shop</title>
	</head>
	<!-- CheckDate is loaded instantly to not allow the user to set the date after today -->
	<body onload="checkDate()">
		<header>
			<a href="http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a>
		</header>
		<hr>
		<!-- Include Menubar and PHP files -->
		<?php include '../../Resources/PHP/menubar.php'; ?>
		<hr>
		<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>
		<br>
		<!-- Create a form, with all the neceaasry details -->
		<form name="myForm" action = "NewInvoice.php" onsubmit="return confirmCheck()" method = "POST" class="formWidth40">
		<br>
			<h2 class="Login centerAlign">New Invoice </h2>
			<br><br>
			<label for="listbox" > Supplier </label>
			<?php include 'listbox.php'; ?>
			 
			<br><br>
			<!-- Use TextArea to allow the address to be added in a far more appealing way -->
			Address:
			<textarea id="address" class="inputP" rows="3" cols="20" disabled>
			</textarea>
			<br><br><br>
			<label for="addref" > Reference Number </label>
			<input type="text" name="addref" id="addref" class="inputP" pattern="[A-Za-z0-9 ]{1,20}" title="Can have alphaneumeric characters, spaces, and dashes, up to 20 characters" required/>
			
			<br><br>
			
			<label for="adddategot" > Date of Invoice </label>
			<input type="date" name="adddategot" id="adddategot" onblur="checkDate()" max='2000-13-13' class="inputP" required/>
			
			<br><br>
			
			<label for="addamount" > Amount(&euro;) </label>
			<input type="number" min=0 step="any" name="addamount" id="addamount" class="inputP" required />
			<br><br>
			<br><br>
			<!-- Use a div to align the buttons -->
			<div class="centerAlign">
				<input type="button" onclick="back()" value="Back" class="button">
				<input type="button" onclick="help()" value="Help" class="button">
				<input type="reset"  value="Clear" class="button">
				<input type="submit" name="submit" id="submit" value="Create" class="button"/>
			</div>
		</form>
		<br><br>
		<br><br>
	    <div class="footer">Speed Shop 2017&reg;</div>
		<?php
			//define the choice as false, if it is set then define it as true and display the message
			$choice = false;
			if(ISSET($_POST['complete']))
			{
				$choice = true;
				UNSET($_POST['complete']);
			}
			if($choice == true)
			{
				echo "<script langauge = 'javascript'>
					alert('Congratulations, the Invoice was lodged sucessfully')
					</script>";
				
			}
		?>
	</body>
</html>