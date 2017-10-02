<!DOCTYPE html>
<?php include '../../Resources/PHP/db.inc.php'; ?>
<html>
	<html>
	<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
	<link rel = "stylesheet" href = "job.css">
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
    <form action = "JobsReport.html.php" method = "post" name  = "reportForm">
		<input type = "hidden" name = "choice">
<h1>Jobs Report</h1>
		<br>
		<br>
		<script>
			function dateOrder()
			{
				document.reportForm.choice.value = "Date";
				document.reportForm.submit();
			}
			
			function surnameOrder()
			{
				document.reportForm.choice.value = "LastName";
				document.reportForm.submit();
			}
		</script>
		
		<?php
		$choice = "LastName";
		if(ISSET($_POST['choice']))
		{
			$choice = $_POST['choice'];
		}
		if($choice == "Date")
		{
		?>
			<script>
				document.getElementById("dateButton").disabled = true;
				document.getElementById("nameButton").disabled = false;
			</script>
		<?php
			$sql = "SELECT * FROM Jobs INNER JOIN Customers on Jobs.CustomerID = Customers.CustomerID WHERE AccountofWork != '' ORDER by Date Desc";
			produceReport($con, $sql);
		}
	else
	{
		?>
		<script>
			document.getElementById("nameButton").disabled = true;
			document.getElementById("dateButton").disabled = false;
		</script>
		<?php
		
		$sql = "SELECT * FROM Customers  INNER JOIN Jobs on Jobs.CustomerID = Customers.CustomerID WHERE DeleteFlag = 0 AND AccountofWork != '' ORDER by LastName";
		produceReport($con,$sql);
	}

function produceReport($con,$sql)
{
	$result = mysqli_query($con,$sql);
	echo "<div align = 'center'>
	<table>
	<tr><th>Date</th><th>Registration Number</th><th>Customer Name</th><th>Total Time Taken</th><th>Total Cost</th></tr>";
	
	while($row = mysqli_fetch_array($result))
	{
		$date = date_create($row['Date']);
		$FDate = date_format($date, "d/m/Y");		
	   echo"<td>".$FDate."</td>
			<td>". $row['CarRegistration']. "</td>
			<td>".$row['FirstName']. " " . $row['LastName']. "</td>
			<td>". $row['TimeTaken']. "</td>
			<td>". $row['Charge']. "</td>
		   	</tr>";
			
	}
	echo "</table>
	</div>
	<br><br>";
	
}
mysqli_close($con);
?>
<input class = "buttons2 marginRight" type="button" value="Back" name="back" onclick = "history.go(-1);" />
<input type = "button" id = "dateButton" class = "marginRight buttons2" value = "DateOrder" onclick = "dateOrder()" title = "Click here to see persons in reverse date of birth order">
		
		<input type = "button" id = "nameButton" class = "marginRight buttons2" value = "Surname Order" onclick = "surnameOrder()" title = "Click here to see Persons in alphabetical order of surname">
		
	</body>
</html>
		