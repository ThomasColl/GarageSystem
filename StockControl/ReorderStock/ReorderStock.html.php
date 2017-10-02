<!--
Name: 			Alex Matthews
Student Number: C00208942
Purpose:		Reorder Stock
File:			ReorderStock.html.php
-->

<!DOCTYPE html>
<?php session_start() ?>
<html>

<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
    <link rel="stylesheet" type="text/css" href="ReorderStock.css">				<!--ReorderStock.css-->
    <link rel="stylesheet" type="text/css" href="http://garage.candept.com/Resources/CSS/General.css">				<!--General.css-->
    <script type="text/javascript" src="ReorderStock.js"></script>				<!--ReorderStock.js-->
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>	<!--LoggedInAndCurrentTime.js - Update the time-->
    <title align="center">Speed Shop - Reorder Stock</title>
</head>

<body>
    <header>
        <a href = "http://garage.candept.com/MainMenu.html.php"><h1 class = "header centerAlign">Speed Shop</h1></a>	<!--Main heading-->
    </header>
    <hr>

    <?php include '../../Resources/PHP/menubar.php'; ?>		<!--Include the menubar-->
    <hr>
	<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>	<!--Include the time and logged in person in the top right-->
	<br><br>
	<div id = "mainDiv">
		<h2 class="centerAlign">Reorder Stock</h2><br>
		<input type="text" id="search" onkeyup="searchFunction()" placeholder="Search by description.."><br><br>	<!--Search box-->
		<?php include 'ReorderStock.php'; ?>	<!--Posted values processed in ReorderStock.php-->
		<br>
		<form action = "ReorderStock.html.php" method = "Post" name = "reorderStockForm" id = "reorderStockForm" onsubmit = "return addItemToOrder()">	<!--This form posts to this page when an item is added to the order - I did this so that the table updates correctly and so that I could keep track of the order -->
			<!--Hidden input to store the currently selected item - This is later used as the index for an associative array session variable which stores each item on the order and the quantity of the item on the order-->
			<input id = "selectedItem" type = "hidden" name = "selectedItem">	
			
			<input id = "selectedItemSupplier" type = "hidden" name = "selectedItemSupplier">	<!--Hidden input to store the id of the supplier the user is currently ordering from-->
			<label class = "marginLeft" for = "quantity">Enter Quantity:</label><br>
			<input class = "buttons greyHover" id="resetOrder" type="button" value="Reset Order" onclick = "resetCurrentOrder()"/> 			<!--This button cancels/resets the current order-->
			<input class = "buttons greyHover" id="addToOrder" type="submit" value="Add to Order" />  	<!--Adds the selected item to the order-->
			<input type = "number" class = "marginLeft" name = "quantity" id = "quantity" min= "1" max= "10000" required disabled />	<!--Input box for the quantity-->
			<br><br><br>
		</form>
		<?php 	
				//Only produce the current order table if an order is in progress - The if statement achieves this
				if (ISSET($_POST['selectedItemSupplier']) && $_POST['selectedItemSupplier'] != "") {
					produceOrderTable($con);
				}
		?>
		<br><br>
		<form id = "printReorderLetterForm" action = "ReorderLetter.html.php" onsubmit = "return confirmCheck()">
			<input class="buttons greyHover" id="button1" type="submit" value="Make Order"/>
			<!--Hidden input to store the id of the supplier the user is currently ordering from - This is for when the order is complete and the user clicks make order-->
			<input id = "selectedItemSupplier1" type = "hidden" name = "selectedItemSupplier1">
			<input class="buttons marginRight greyHover" id="button2" type="button" value="Help" name="Help" onclick="showHelpPrompt()" />
			<input class="buttons marginRight greyHover" id="button3" type="button" value="Back" name="Back" onclick="goBack()" />
		</form>
		<br>
	</div><br><br>
    <div id = "foot" class="footer">Speed Shop 2017&reg;</div>	<!--Footer-->
</body>

</html>