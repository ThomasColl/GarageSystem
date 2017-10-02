<?php
	include '../../Resources/PHP/db.inc.php';
	
	$sql = "SELECT MAX(BookingID) AS High FROM Bookings";
if (!$result = mysqli_query($con,$sql))// if the query has a problem will output the code below
{
	die ("An error in the SQL Query:" .mysqli_query($con));
}
else {
	if (mysqli_affected_rows($con) == 1)
	{
		$row = mysqli_fetch_array($result);
	}
}
$High = $row['High']+1;
$sql = "INSERT INTO Bookings (BookingID,CustomerID,BDate,BTime,DeleteFlag)
			VALUES ($High,'$_POST[CustomerID]','$_POST[Date]','$_POST[Time]',0)";

			
			
if (!mysqli_query($con,$sql))// if the query has a problem will output the code below
{
	die ("An error in the SQL Query:" .mysqli_query($con));
}	
	else
	{
		echo "<script type = 'javascript' >alert(\"successfully booked into the table\");</script> ";
	}
			
	
	mysqli_close($con);
?>
	<form action = "MakeBooking.html.php" id="pageform" method="post"/>
	<input name="complete" value="true">
	<script type="text/javascript"> forceSubmit() </script>
	</form>
