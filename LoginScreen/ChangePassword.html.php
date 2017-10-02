<!DOCTYPE html>
<!---
	//Name: Cathal Brady
	//Student Number: C00202493
--->
<html>
  <head>
  
	<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg"><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css"><!-- pulls stylesheets form the resources folder    --->
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script><!-- pulls stylesheets form the resources folder    --->
	<script type="text/javascript" src="ChangePass.js"></script>
	<link rel="stylesheet" href="Login.css"> 
	
    <title align="center">Speed Shop - Change Password</title>
	</head><br>
	<body>

    <header>
       <a href="http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a><!-- goes to the main menu when clixcked  --->
    </header>
    <hr>
	<?php include '../Resources/PHP/menubar.php'; ?><!-- includes the menu bar    --->
    <hr>
	<?php include '../Resources/PHP/LoggedInAndCurrentTime.php'; ?><!-- includes the loggin and current time     --->
        <br><br>
<!-------------------------------------START FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  


			<form name="myForm" action = "changePass.php" onsubmit="return confirmCheck()" method = "POST" class="formWidth40">
			<h2 class="centerAlign">Welcome. Login to your account.</h2>
			
			<label for="EmployeeID">EmployeeID:</label>
			<input class="inputP" type="text" name="EmployeeID" id="EmployeeID" title="Please enter your username here." placeholder="Enter username.."  required autofocus/><br><br>
		
			
			<label for="Password">Old Password:</label>
			<input class="inputP" type="Password" name="Password" id="Password" title="Please enter your old password here." 
			placeholder="Enter password.."  required/><br><br>
		
			<label for="newPass">New Password:</label>
			<input class="inputP" type="Password" name="newPass" id="newPass" title="Please enter your New password here." 
			placeholder="Enter password.."  required/><br><br>
	
			<label for="ConfirmPass">Confirm Password:</label>
			<input class="inputP" type="Password" name="ConfirmPass" id="ConfirmPass" title="Please confirm your New password here." 
			placeholder="Enter password.."  required/><br><br>

			<br><br>

			<input type="submit" value="Login" id="button"  class="buttons" />
			 <input type="reset" value="Clear" id="button2" class="buttons marginRight" name="clearForm" onclick="refresh()"/>  
		<input type="button" value="Help" id="button3" class="buttons marginRight" name="Help" onclick="help()"/>  
			<br><br>
			</form>
	 
<!-------------------------------------END FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  	  
	  <br><br>
	<div class="footer">Speed Shop 2017&reg;</div>
</body>
</html>