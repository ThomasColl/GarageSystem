<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<script type="text/javascript" src="CancelBooking.js"></script>
<form action = "CancelBooking.html.php" id="pageform" method="post"/>
<?php
	//include the db.inc.php stored in the Resources file
	include '../../Resources/PHP/db.inc.php';
	date_default_timezone_set("UTC");
	
	//use strip tags to remove HTML injection
	$bookingID = strip_tags($_POST['cancel']);
	
	//set the deleteflag to 1 so to define the post as deleted 
	$sql = "UPDATE Bookings SET DeleteFlag = 1 WHERE BookingID = '" . $bookingID . "'";
	
	//if the query fails then kill the php
	if(!mysqli_query($con, $sql))
	{
		die("An Error in the SQL Query : " . mysqli_error($con));
	}
	//assuming the query is good then create inputs to check in the .html.php file
	echo "<input name=\"returnid\" value=\"" . $bookingID . "\">";
	echo "<input name=\"complete\" value=\"true\">";
	
	//close the connection 
	mysqli_close($con);
?>
	<input name="complete" value="true">
	<!-- force submit the form to make it look seemless -->
	<script type="text/javascript"> forceSubmit() </script>
</form>