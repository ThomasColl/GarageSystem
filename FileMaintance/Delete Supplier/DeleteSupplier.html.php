<!DOCTYPE html>
<!--
Name: 			Finnian Fnning
Student Number: C00203797
Purpose:		Delete Supplier
File:			DeleteSupplier.html.php
-->
<html>
	<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
    <link rel = "stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
    <script type="text/javascript" src="deleteSupplier.js"></script>	
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>	
    <title>Speed Shop -Delete Supplier</title>
		<style>
			a
			{
				text-decoration: none;
			}
		</style>
</head>

<body>
    <header>
        <a href = "http://garage.candept.com/MainMenu.html.php"><h1 class = "header centerAlign" >Speed Shop</h1></a>
    </header>
    <hr>
	
    <?php include '../../Resources/PHP/menubar.php'; ?>
    <hr>
	<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>
	<br>
	<br>
		
		<form name = "delteForm" action = "deleteSupplier.php" method = "POST" class = "formWidth40" onsubmit = "return confirmCheck()">
		<h2 class="centerAlign">Delete Supplier</h2> 
			
			<?php include 'deleteSupplierListbox.php';?>
			<br><br>
			<label for="delid">ID:</label>
			<input class="inputP" type="text" name="delid" id="delid" disabled>
			<br><br>
			<label for="delSupplierName">Name:</label>
			<input class="inputP" type="text" name="delSupplierName" id="delSupplierName" disabled>
			<br><br>
			
			<label for="delStreet">Street:</label>
			<input class="inputP" type="text" name="delStreet" id="delStreet" disabled>
			<br><br>
			
			<label for="delTown">Town:</label>
			<input class="inputP" type="text" name="delTown" id="delTown" disabled><br><br>
			
			<label for="delCounty">County:</label>
			<input class="inputP" type="text" name="delCounty" id="delCounty" disabled><br><br>
			
			<label for="delTelephone">Phone:</label>
			<input class="inputP" type="text" name="delTelephone" id="delTelephone" disabled><br><br>
			
			<label for="delWebsite">Website:</label>
			<input class="inputP" type="text" name="delWebsite" id="delWebsite" disabled> <br><br>
			
			<label for="Email">Email:</label>
			<input class="inputP" type="text" name="delEmail" id="delEmail"disabled>
			<br><br>
			
			<input class = "buttons" type="submit" value="Delete Supplier" name="submit">
			<input class = "buttons marginRight" type="reset" value="Clear Form" name="reset"/>
			<input class = "buttons marginRight" type="button" value="Help" name="help" onclick = "helpPrompt()"/>
			<input class = "buttons marginRight" type="button" value="Back" name="back" onclick = "history.go(-1);" />
			<br>
			

		</form>
		<br><br><br>
		<div class = "footer">Speed Shop 2017&reg;</div>
	</body>
</html>