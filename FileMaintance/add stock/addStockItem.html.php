<!DOCTYPE html>

<!--
		Name: Cathal Brady
		Student Number: C00202493   
--->
<html>
  <head>

	<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg"><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css"><!-- pulls stylesheets form the resources folder    --->
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="AddStock.css">
	<link rel="stylesheet" href="timer.js.">
	  <script type="text/javascript" src="AddStock.js"></script>
 
    <title>Speed Shop - Add New Stock Item</title>
	</head><br>
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

      <form class = "formWidth40" id="AddStockForm" action ="addStock.php" method ="post" onsubmit="return confirmCheck()" >
        <h2 class="centerAlign">Add Stock</h2><br>
		  <label for="name">Supplier:</label> <?php include 'SupplierList.php'; // includes the supplier list for the stock ?>
        <br><br>
      
	  <label for="Description">Description:</label>
        <input class="inputP" type="text" name="Description" id="Description" title="Please enter a description of the item." pattern="[0-9A-Za-z ]{1,}" required autofocus/><br><br>
       
	   <label for="ReorderLevel">Reorder Level:</label>
        <input class="inputP" type="number" name="ReorderLevel" id="ReorderLevel" title="Please enter the reorder level." min ="1" max  ="99" required/><br><br>
        
		<label for="ReorderQuantity">Reorder Quantity:</label> 
        <input class="inputP" type="number" name="ReorderQuantity" id="ReorderQuantity" title="Please enter the reorder level." min ="1" max  ="99" required/><br><br>
        
		<label for="CostPrice">Cost Price:</label> 
        <input class="inputP" type="number" name="CostPrice" id="CostPrice" title="Please enter the Cost per unit." step = ".01" required/><br><br>
        
		<label for="RetailPrice">Retail Price:</label>
        <input class="inputP" type="number" name="RetailPrice" id="RetailPrice" title="Please enter the Retail price."step = ".01" required/><br><br><br><br>
		
		<input  class="buttons" type="submit" value="Add Stock" id="button" />
        <input type="reset" class="buttons marginRight"value="Clear Form" name="clearForm"id="button2" />  
		<input type="button" class="buttons marginRight" class="buttons marginRight" name="Help"  value="Help" id="button3" onclick="help()"/>  
		<input type="button" class="buttons marginRight" value="Back" onclick="refresh()" name="Back" id="button4" />  
		<br><br>
      </form>
<!-------------------------------------END FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  
	  <br><br>
	<div class="footer">Speed Shop 2017&reg;</div>
</body>
</html>

