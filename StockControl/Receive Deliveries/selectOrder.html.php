<!DOCTYPE html>
<!--
Name: 			Finnian Fnning
Student Number: C00203797
Purpose:		Receive Delivery
File:			ReceiveDeliveries.html.php
-->
<html>
	<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
    <link rel = "stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
    <script type="text/javascript" src="recieveDeliveries.js"></script>	
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>	
    <title>Speed Shop - Select Order</title>
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
		<form name = "receiveForm" action = "ReceiveDeliveries.html.php" method = "POST" class = "formWidth40" onsubmit = "return confirmCheck()">
		<h2 class="centerAlign">Receive Deliveries</h2> 
			
			<?php include 'recieveDeliveriesListbox.php';?>
			<br><br>
			<input class = "buttons" type="submit" value="Confirm" name="submit">
			<input class = "buttons marginRight" type="reset" value="Clear Form" name="reset"/>
			<input class = "buttons marginRight" type="button" value="Help" name="help" onclick = "helpPrompt()"/>
			<input class = "buttons marginRight" type="button" value="Back" name="back" onclick = "history.go(-1);" />
			<br>
		</form>
		<br><br><br>
		<div class = "footer">Speed Shop 2017&reg;</div>
	</body>
</html>