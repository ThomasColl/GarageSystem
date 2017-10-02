<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Link the common and specific resources -->
		<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
		<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
		<link rel="stylesheet" href="StockReport.css"> 
		<script type="text/javascript" src="StockReport.js"></script>
		<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>
		<title align="center">Speed Shop - Stock Report</title>
	</head>
	<body>	
		<header>
			<a href="http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a>
		</header>
		<hr>
		<!-- Include Menubar and PHP files -->
		<?php include '../../Resources/PHP/menubar.php'; ?>
		<hr>
		<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>
		<br>
		<!-- create a form that will submit to itself -->
		<form name="myForm" action = "StockReport.html.php" method = "POST" >
			<input type="hidden" name="choice">
		</form>
		<h1 class="centerAlign"> Stock Report </h1>

		<!-- Center align buttons via div -->
		<div class="centre">
			<input type="button" id="descriptionButton" value="Description Order" onclick="descriptionOrder()"
			title="Click ere to see Stock in alphabetical order of Stock description" class="bigButton centerAlign">
			<input type="button" id="supplierButton" value="Supplier Order" onclick="supplierOrder()"
			title="Click here to see Stock in alphabetical order of Supplier Name" class="bigButton centerAlign">
		</div>
		<br><br>
		
		<?php
			//define the choice as description
			$choice = "Description";
			
			//if choice is set then define it as the choice
			if(ISSET($_POST['choice']))
			{
				$choice = $_POST['choice'];
			}
			if($choice == "Description")
			{
				?>
				<script>
					//select which button is able to be pressed
					document.getElementById("descriptionButton").disabled = true;
					document.getElementById("supplierButton").disabled = false;
				</script>
				<?php
					//make sql query, ordering by Stock Description
					$sql = "SELECT Stock.StockID,Stock.SupplierID,Stock.QuantityInStock,Stock.Description,Suppliers.SupplierName FROM Stock INNER JOIN Suppliers ON Stock.SupplierId = Suppliers.SupplierID WHERE Stock.DeleteFlag=0 ORDER BY Stock.Description";
					produceReport($con, $sql);
			}
			else
			{
				?>
				<script>
					//select which button is able to be pressed
					document.getElementById("descriptionButton").disabled = false;
					document.getElementById("supplierButton").disabled = true;
				</script>
				<?php
					//make sql query, ordered by Supplier ID
					$sql = "SELECT Stock.StockID,Stock.SupplierID,Stock.QuantityInStock,Stock.Description,Suppliers.SupplierName FROM Stock INNER JOIN Suppliers ON Stock.SupplierId = Suppliers.SupplierID WHERE Stock.DeleteFlag=0 ORDER BY Stock.SupplierID";
					produceReport($con, $sql);
			};
			
			//Report performs the query
			function produceReport($con, $sql)
			{
	//			$result = mysqli_query($con, $sql);
				//If the query fails then kill php
				if(!$result = mysqli_query($con, $sql))
				{
					die("An Error in the SQL Query : " . mysqli_error($con));
				}
				echo "<div class=\"flow\">";
				echo "<table>
						<tr><th> Stock Description </th><th> Stock Number </th><th> Qty in Stock </th> <th> Supplier Name </th></tr>";
				//use row to fill each td 
				while($row= mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo  "<td>" . $row['Description'] . "</td>";
					echo  "<td>" . $row['StockID'] . "</td>";
					echo  "<td>" . $row['QuantityInStock'] . "</td>";
					echo  "<td>" . $row['SupplierName'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
			}
			mysqli_close($con);
		?>
		<br><br><br>
	    <div class="footer">Speed Shop 2017&reg;</div>
	</body>
</html>