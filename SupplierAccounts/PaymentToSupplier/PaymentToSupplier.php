<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<!-- Link the javascript for force submit -->
<link rel="stylesheet" href="PaymentToSupplier.css">
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Link the common and specific resources -->
		<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
		<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
		<link rel="stylesheet" href="PaymentToSupplier.css">
		<script type="text/javascript" src="PaymentToSupplier.js"></script>
		<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>
		<title align="center">Speed Shop</title>
	</head>
	<body>
		<header>
			<a href="http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a>
		</header>
		<hr>
		<!-- Include Menubar and PHP files -->
		<h2 class="Login centerAlign">Payment To Supplier </h2>
		<hr>
		<?php include '../../Resources/PHP/menubar.php'; ?>
		<hr>
		<br><br>
		<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>
		<div id="printable" class="print">
			<?php
				//establish a connection to the database
				include '../../Resources/PHP/db.inc.php';
				date_default_timezone_set("UTC");
				
				//define the total cost and total orders variable
				$totalCost = 0;
				$totalOrders = 0;
				$date = date("Y-m-d");
				//collect all the invoices for the selected supplier
				$sql = "SELECT * FROM SupplierInvoices WHERE SupplierID= '" . $_POST['paymentid'] . "' AND DatePaid= '0000-00-00'"; 
				if(!$result = mysqli_query($con, $sql))
				{
					die( 'Error in querying the database' . mysqli_error($con));
				}
				else
				{
					//if there are records then print out the invoice
					if(mysqli_affected_rows($con) != 0)
					{
						echo "<br><br>";
						echo "<div class='right'> 	Speed Shop, <br>
													Tullow Street, <br>
													Carlow <br>
													" . date("d/m/Y") . "<br>";
						echo "</div>";		
						echo "<div class='left'> "     . strip_tags($_POST['paymentname']) . //Strip tags to remove HMTL injection
												"<br>" . strip_tags($_POST['paymentstreet']) . 
												"<br>" . strip_tags($_POST['paymenttown']) . 
												"<br>" . strip_tags($_POST['paymentcounty'])
												. "<br><br>";
						echo "</div>";
						echo "<table align=\"center\">";
						echo "<tr>";
							echo "<th>Your Invoice Reference</th>";
							echo "<th>Amount</th>";
						echo "</tr>";
						while($row = mysqli_fetch_array($result))
						{
							//use add on the amount to the total costs
							$totalCost += $row['Amount'];
							$totalOrders++;
							$row['DatePaid'] = $date;
							echo "<tr style='text-align:center'>";
								echo "<td>" . $row['ReferenceNum'] . "</td>";
								echo "<td>" . $row['Amount'] . "</td>";
							echo "</tr>";
						}
						echo "<tr>";
							echo "<th> Total Payment </th>";
							echo "<th> Total Amount </th>";
						echo "</tr>";
						echo "<tr>";
							echo "<th>" . $totalOrders . "</th>";
							echo "<th>" . $totalCost . "</th>";
						echo "</tr>";
						echo "</table>";
						echo "<br>";
						echo "Enclosed please find the cheque for " . $totalCost . " in payment of the following invoices. <br>";
						echo "<div class='right'> Yours sincerely, <br>";
						echo "______________ <br>";
						echo "Manager </div>";
					}
					//if there are no rows then display the message
					else
					{
						echo "<br><br>";
						echo "<p id=\"big\">No orders exist for this Supplier</p>";
					}
				}
				//Update the table
				$sql = "UPDATE SupplierInvoices SET DatePaid = '" . $date . "' WHERE SupplierID= '" . $_POST['paymentid'] . "' AND DatePaid= '0000-00-00'";
				if(!$result = mysqli_query($con, $sql))
				{
					die( 'Error in querying the database' . mysqli_error($con));
				}				
				mysqli_close($con);
				
			?>
		</div>
		<br><br>
		<div class="centre">
			<!-- allow the buttons to be centred -->
			<form action = "PaymentToSupplier.html.php" method="post" class="return"/>
				<center>
					<input type="submit" class="button1" value="Return to Preious Screen">
					<input type="button" class="button1" value="Print" onclick="print()">		
				</center>
			</form>
		</div>
		<div class="footer">Speed Shop 2017&reg;</div>
		</body>
</html>