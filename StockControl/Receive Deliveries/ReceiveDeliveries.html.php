<!--
Name: 			Finnian Fnning
Student Number: C00203797
Purpose:		Receive Delivery
File:			ReceiveDeliveries.html.php
-->
<?php
//Get variables to be read to the screen from the database.
include '../../Resources/PHP/db.inc.php';//Connection to the database.

$getx=mysqli_query($con, "SELECT OrderID FROM Orders WHERE OrderID = '$_POST[listbox]'"); 
$gotx = mysqli_fetch_array($getx); 
$OrderID = $gotx['OrderID'];

$get=mysqli_query($con, "SELECT OrderDate FROM Orders WHERE OrderID = '$_POST[listbox]'"); 
$got = mysqli_fetch_array($get); 
$OrderDate = $got['OrderDate'];

$geta=mysqli_query($con, "SELECT SupplierID FROM Orders WHERE OrderID = '$_POST[listbox]'"); 
$gota = mysqli_fetch_array($geta); 
$SupplierID = $gota['SupplierID'];

$getb=mysqli_query($con, "SELECT SupplierName FROM Suppliers WHERE SupplierID = '$SupplierID'"); 
$gotb = mysqli_fetch_array($getb); 
$SupplierName = $gotb['SupplierName'];

$getc=mysqli_query($con, "SELECT Street FROM Suppliers WHERE SupplierID = '$SupplierID'"); 
$gotc = mysqli_fetch_array($getc); 
$Street = $gotc['Street'];

$getd=mysqli_query($con, "SELECT Town FROM Suppliers WHERE SupplierID = '$SupplierID'"); 
$gotd = mysqli_fetch_array($getd); 
$Town = $gotd['Town'];

$gete=mysqli_query($con, "SELECT County FROM Suppliers WHERE SupplierID= '$SupplierID'"); 
$gote = mysqli_fetch_array($gete); 
$County = $gote['County'];

$getf=mysqli_query($con, "SELECT StockID FROM OrderItems WHERE OrderID= '$_POST[listbox]'"); 
$gotf= mysqli_fetch_array($getf); 
$StockID = $gotf['StockID'];

$getg=mysqli_query($con, "SELECT Description FROM Stock WHERE StockID= '$StockID'"); 
$gotg= mysqli_fetch_array($getg); 
$Description = $gotg["Description"];

$geth=mysqli_query($con, "SELECT Quantity FROM OrderItems WHERE OrderID= '$_POST[listbox]'"); 
$goth= mysqli_fetch_array($geth); 
$Quantity = $goth['Quantity'];

?>
<!DOCTYPE html>
<?php include '../../Resources/PHP/db.inc.php'; ?>
<html>
	<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
    <link rel = "stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
    <script type="text/javascript" src="recieveDeliveries.js"></script>	
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>	
    <title>Speed Shop - Receive Deliveries</title>
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
	
		<form name = "receiveForm" action = "recieveDeliveries.php" method = "POST" class = "formWidth40" onsubmit = "return 							confirmCheck()">
		<h2 class="centerAlign">Receive Deliveries</h2> 
			
			<label for="recID">Order Number:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recID' id='recID' value = $OrderID disabled>";
			?>
			<br><br>
			<label for="recDate">Order Date:</label>
			<?php
			echo
			"<input class= 'inputP' type='date' name='recDate' id='recDate' value = $OrderDate disabled>";
			?>
			<br><br>
			<label for="recName">Supplier Name:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recName' id='recName' value = $SupplierName disabled>";
			?>
			<br><br>
			
			<label for="recStreet">Street:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recStreet' id='recStreet' value = $Street disabled>";
			?>
			<br><br>
			<label for="delTown">Town:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recTown' id='recTown' value = $Town disabled>";
			?>
			<br><br>
			<label for="recCounty">County:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recCounty' id='recCounty' value = $County disabled>";
			?>
			<br><br>
			<label for="recStockID">Stock Number:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recStockID' id='recStockID' value = $StockID disabled>";
			?>
			<br><br>
			<label for="recDescription">Description:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recDescription' id='recDescription' value = $Description disabled>";
			?>
			<br><br>
			<label for="recQuantity">Quantity:</label>
			<?php
			echo
			"<input class= 'inputP' type='text' name='recQuantity' id='recQuantity' value = $Quantity disabled>";
			?>
			<br><br>
			
			<input class = "buttons" type="submit" value="Recieved" name="submit">
			<input class = "buttons marginRight" type="reset" value="Clear Form" name="reset"/>
			<input class = "buttons marginRight" type="button" value="Help" name="help" onclick = "helpPrompt2()"/>
			<input class = "buttons marginRight" type="button" value="Back" name="back" onclick = "history.go(-1);" />
			<br>
		</form>
		<br><br><br>
		<div class = "footer">Speed Shop 2017&reg;</div>
	</body>
</html>