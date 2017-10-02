<!DOCTYPE html>
<!--
Name: 			Finnian Fnning
Student Number: C00203797
Purpose:		Add Supplier
File:			ReceiveDeliveries.html.php
-->
<html>
	<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
    <link rel = "stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
    <script type="text/javascript" src="addSupplier.js"></script>	
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>	
    <title>Speed Shop - Add Supplier</title>
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
		<form action = "addSupplier.php" method = "POST" class = "formWidth40" onsubmit = "return confirmCheck()">
		<h2 class="centerAlign">Add Supplier</h2> 
		<br>
			<label for="Name">Name:</label>
			<input class="inputP" type="text" name="name" id="name"  
			placeholder="e.g. John Burke" pattern = "[a-zA-Z\s. ,]{1,400}" title = "e.g. John Byrne, no non-alphabetic characters, no ' " required autofocus/><br><br>
			
			<label for="Street">Street:</label>
			<input class="inputP" type="text" name="street" id="street"
			placeholder="e.g. 4, Thomas Street" pattern  = "[a-zA-Z\s. , 0-9]{1,100}" title = "e.g. 4, Thomas Street or Windmill Lane" required autofocus/><br><br>
			
			<label for="Towm">Town:</label>
			<input class="inputP" type="text" name="town" id="town"
			placeholder="e.g. Carlow" pattern  = "[a-zA-Z\s. , ' 0-9]{1,100}" title = "e.g. Carlow" required autofocus/><br><br>
			
			County:
			<select name= "county" class = "inputP">
			<option value="Antrim"> Antrim</option>
			<option value="Armagh">Armagh</option>
			<option value= "Carlow">Carlow</option>
			<option value="Cavan">Cavan</option>
			<option value="Clare">Clare</option>
			<option value="Cork">Cork</option>
			<option value="Derry">Derry</option>
			<option value="Donegal">Donegal</option>
			<option value="Down">Down</option>
            <option value="Dublin">Dublin</option>
            <option value="Fermanagh">Fermanagh</option>
            <option value="Galway">Galway</option>
            <option value="Kerry">Kerry</option>
            <option value="Kildare">Kildare</option>
            <option value="Kilkenny">Kilkenny</option>
            <option value="Laois">Laois</option>
            <option value = "Leitrim">Leitrim</option>
            <option value="Limerick">Limerick</option>
            <option value="Longford">Longford</option>
            <option value="Louth">Louth</option>
            <option value="Mayo">Mayo</option>
            <option value="Meath">Meath</option>
            <option value="Monaghan">Monaghan</option>
            <option value="Offaly">Offaly</option>
            <option value="Roscommon">Roscommon</option>
            <option value="Sligo">Sligo</option>
            <option value="Tipperary">Tipperary</option>
            <option value="Tyrone">Tyrone</option>
            <option value="Waterford">Waterford</option>
            <option value="Westmeath">Westmeath</option>
            <option value="Wexford">Wexford</option>
            <option value="Wicklow">Wicklow</option>
			</select>
			<br><br>
			
			<label for="Telephone">Phone:</label>
			<input class="inputP" type="text" name="phone" id="phone" 
			placeholder="e.g. +353 (86 311 0753)" pattern = "[0-9 + () - ]{3,20}" title = "e.g. +353 (86 311 0753) no letters" required	 autofocus/><br> <br>
			
			<label for="Website">Website:</label>
			<input class="inputP" type="text" name="website" id="website"  
			placeholder="e.g. www.user.com" title = "e.g www.johnbyrne.com"> <br><br>
			
			<label for="Email">Email:</label>
			<input class="inputP" type="email" name="email" id="email"
			placeholder = "e.g. user2010@hotmail.com"
			title = "e.g. jbyrne@gmail.com" required autofocus/><br><br>
			<br>
			<input class = "buttons" type="submit" value="Add Supplier" name="submit">
			<input class = "buttons marginRight" type="reset" value="Clear Form" name="reset"/>
			<input class = "buttons marginRight" type="button" value="Help" name="help" onclick = "helpPrompt()"/>
			<input class = "buttons marginRight" type="button" value="Back" name="back" onclick = "history.go(-1);" />
			<br>
			

		</form>
		<br><br><br>
		<div class = "footer">Speed Shop 2017&reg;</div>
	</body>
</html>