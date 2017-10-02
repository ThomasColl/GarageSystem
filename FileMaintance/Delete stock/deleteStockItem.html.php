<!DOCTYPE html>
<!--
	//Name: Cathal Brady
	//Student Number: C00202493
---->
<html>
  <head>

	<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg"><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css"><!-- pulls stylesheets form the resources folder    --->
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="RemoveStock.css"> 
	<script type="text/javascript" src="deleteStock.js"></script>
	
	
    <title>Speed Shop - Delete Stock Item</title>
	</head><br>
  <body>

    <header>
    <a href="http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a><!-- goes to the main menu when clixcked  --->
    </header>
    

    <hr>
	<?php include '../../Resources/PHP/menubar.php'; ?><!-- includes the menu bar    --->
    <hr>
	<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?><!-- includes the loggin and current time     --->
<!-------------------------------------START FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  
	<br><br>
	<form name="myForm" action = "RemoveStock.php" onsubmit="return confirmCheck()" method = "POST" class="formWidth40">
			<h2 class="centerAlign"> Delete Stock </h2>		
			
			<br><label for='listbox.php' >Pick an item for deletion:</label><?php include 'listbox.php';?> 
			
			<br><br>
			
			<label for="StockID" >Stock Identification:</label>
			<input type="text" name="StockID" id="StockID" class="inputP" readonly />
			<br><br>
			
			<label for="SupplierName" > Supplier Name:</label>
			<input type="text" name="SupplierName" id="SupplierName" class="inputP" disabled />
			<br><br>
			
			<label for="SupplierID" > Supplier ID:</label>
			<input type="text" name="SupplierID" id="SupplierID" class="inputP" disabled />
			<br><br>
			<br><br>
			
		<input  class="buttons" type="submit" value="Delete Stock" id="button" />
        <input class="buttons marginRight" id="button2" type="reset" value="Clear Form" name="clearForm"/>  
		<input class="buttons marginRight" id="button3" type="button" value="Help" name="Help" onclick="help()"/>  
		<input class="buttons marginRight" id="button4" type="button" value="Back" name="Back" onclick="goBack()"/>

		<br>
	</form>
<!-------------------------------------END FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  

 <br><br>  
	<div class="footer">Speed Shop 2017&reg;</div>
</body>
</html>