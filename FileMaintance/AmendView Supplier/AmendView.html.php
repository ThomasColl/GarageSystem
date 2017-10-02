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
		<link rel="stylesheet" href="AmendView.css"> 
		<script type="text/javascript" src="AmendView.js"></script>
		<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>
		<title align="center">Speed Shop - Amend/View Supplier</title>
	</head>
	<body>	
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
		<form name="myForm" action = "AmendView.php" onsubmit="return confirmCheck()" method = "POST" class="formWidth40">
			<h2 class="Login centerAlign">Amend Supplier Details </h2>		
			<br>
			<?php include 'listbox.php'; ?>
			<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()" class="amendViewButton">
			<br><br><br>
			
			<label for="amendid" > Supplier ID </label>
			<input type="text" name="amendid" id="amendid" class="inputP" disabled />
			
			<br><br>
			
			<label for="amendname" > Name </label>
			<input type="text" name="amendname" id="amendname" class="inputP" disabled pattern="[A-Za-z ]{1,40}" title="Must only contain alpha characters and only up to 40 of them" required />
			
			<br><br>
			
			<label for="amendaddressStreet" > Street Name </label>
			<input type="text" name="amendaddressStreet" id="amendaddressStreet" class="inputP" disabled pattern="[0-9A-Za-z',. ]{1,40}" title="Must only contain alphanumeric characters, commas, single quotes and full stops and only up to 40 of them" required/>
			
			<br><br>
			
			<label for="amendaddressTown" > Town Name </label>
			<input type="text" name="amendaddressTown" id="amendaddressTown" class="inputP" disabled pattern="[0-9A-Za-z',. ]{1,40}" title="Must only contain alphanumeric characters, commas, single quotes and full stops and only up to 40 of them" required/>
			
			<br><br>
			
			<label for="amendaddressCounty" > County </label>
			<?php include 'countySelect.php' ?>
			<br><br>
							
			<label for="amendtelephone" > Telephone Number </label>
			<input type="text" name="amendtelephone" id="amendtelephone" class="inputP" pattern="[0-9-() ]{9,15}" title="Must be an Irish number, it can feature brackets, spaces, pluses, dashes and numbers" disabled required/>
			
			<br><br>
			
			<label for="amendwebsite" > Website </label>
			<input type="text" name="amendwebsite" id="amendwebsite" class="inputP" disabled/>
			
			<br><br>

			<label for="amendemail" > Email </label>
			<input type="email" name="amendemail" id="amendemail" class="inputP" disabled required/>
			
			<br><br>
			<br><br>
			<input type="button" onclick="back()" value="Back" class="button margin">
			<input type="button" onclick="help()" value="Help" class="button margin">
			<input type="reset"  value="Cancel" class="button margin">
			<input type="submit" value="Save Changes" class="button"/>

		</form>
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
					alert('Congratulations, the Supplier was amended sucessfully')
					</script>";
				
			}
		?>

	</body>
</html>