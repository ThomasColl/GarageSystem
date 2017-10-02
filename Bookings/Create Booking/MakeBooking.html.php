<!DOCTYPE html>
<!-- Name: Cathal Brady -->
<!-- Student Number: C00202493 -->

<html>
  <head>
  
	<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg"><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css"><!-- pulls stylesheets form the resources folder    --->
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="CreateBooking.css"> 
	<script type="text/javascript" src="CreateBooking.js"></script>
	
    <title>Speed Shop - Make Booking</title>
	</head>
  <body>

    <header>
     	 <a href="http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a><!-- goes to the main menu when clixcked  --->
    </header>
    <hr>
    
	<?php include '../../Resources/PHP/menubar.php'; ?><!-- includes the menu bar    --->
    <hr>
	<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?><!-- includes the loggin and current time     --->
        <br><br>
<!-------------------------------------START FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  
	<div class = "formWidth40">
		<h2 align = "center">Make Booking</h2><br>
	<?php include 'Timelistbox.php';?>
	<form name="myFormDate" action = "" method = "POST" ><br><br>
		
		<label for="Date" > Choose a Date: </label><input  type="date" name="Date" id="Date"required/><input class="buttons" type="submit" name="Changedate" id="Changedate" />
		<br>
		
		</form>
		<br><br>
		<form name="myForm" action = "CreateBooking.php" onsubmit="return confirmCheck()" method = "POST">
		<label for="Date" > Choose a Customer: </label><?php include 'listbox.php';?> 
		<div align="center">
		
		</div>
		
		<br>
		<br><br>
		<input type = "hidden" name = "time" id = "time" value = ""/><!--sets up the blank time and date for the booking --->
		<input type = "hidden" name = "custId" id = "custId" value = ""/><!--the time and date is held here on the form and the user is unaware of this cause in order to do the booking i 
		created the blank space to hold all the variables then these are sent to the database and sets the time and date of the form--->
		<br>
		
		<input  class="buttons greyHover" type="submit" value="Make Booking" id="button" />
		<input  type="reset" value="Clear Form" class="buttons marginRight greyHover" id="button2" name="clearForm" onclick="Reset()"/>  
		<input  type="button" value="Help" class="buttons greyHover marginRight " id="button3" name="Help" onclick="help()"/> 
		<input type="button" class="buttons marginRight greyHover" value="Back" id="button4" name="Back" onclick="Return()"/>  
		<br>
      </form>	 
	  </div>
<!------------------------------------END FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  
	  <br><br>
    
	<div class="footer">Speed Shop 2017&reg;</div>
</body>
</html>
