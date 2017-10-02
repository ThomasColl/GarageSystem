<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Link the common and specific resources -->
		<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
		<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
		<link rel="stylesheet" href="PaymentToSupplier.css">
		<script type="text/javascript" src="PaymentToSupplier.js"></script>
		<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>
		<title align="center">Speed Shop</title>
	</head>
	<body onload="populate()">
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
		<form name="myForm" action = "PaymentToSupplier.php" onsubmit="return confirmCheck()" method = "POST" class="formWidth40">
			<h2 class="Login centerAlign">Payment To Supplier </h2>		
			<br>
			<!-- Use the listbox to display all the details -->
			<label for="listbox" > Supplier </label>
			<?php include 'listbox.php'; ?>
			<br><br><br>
			
			<label for="paymentid" > Supplier ID </label>
			<input type="text" name="paymentid" id="paymentid" class="inputP" disabled />
			
			<br><br>
			
			<label for="paymentname" > Name </label>
			<input type="text" name="paymentname" id="paymentname" class="inputP" disabled />
			
			<br><br>
			
			<label for="paymentstreet" > Street Name </label>
			<input type="text" name="paymentstreet" id="paymentstreet" class="inputP" disabled />
			
			<br><br>
			
			<label for="paymenttown" > Town Name </label>
			<input type="text" name="paymenttown" id="paymenttown" class="inputP" disabled />
			
			<br><br>
			
			<label for="paymentcounty" > County </label>
			<input type="text" name="paymentcounty" id="paymentcounty" class="inputP" disabled />
			<br><br>
							
			<label for="paymenttelephone" > Telephone Number </label>
			<input type="text" name="paymenttelephone" id="paymenttelephone" class="inputP" disabled />
			
			<br><br>
			
			<label for="paymentwebsite" > Website </label>
			<input type="text" name="paymentwebsite" id="paymentwebsite" class="inputP" disabled />
			
			<br><br>

			<label for="paymentemail" > Email </label>
			<input type="email" name="paymentemail" id="paymentemail" class="inputP" disabled />
			
			<br><br>
			<br><br>
			<!-- Use DIV to align the buttons to the centre -->
			<div class="centerAlign">
				<input type="button" onclick="back()" value="Back" class="button margin">
				<input type="button" onclick="help()" value="Help" class="button margin">
				<input type="reset"  value="Cancel" class="button margin">
				<input type="submit" value="Create Invoice" class="button"/>
			</div>
		</form>
		<br><br>
	    <div class="footer">Speed Shop 2017&reg;</div>
	</body>
</html>