<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<!-- Link the javascript for force submit -->
<script type="text/javascript" src="NewInvoice.js"></script>
<?php
	//establish a connection to the database
	include '../../Resources/PHP/db.inc.php';
	date_default_timezone_set("UTC");
	
	//use striptags and explode to get all the IDs
	$supID = $_POST['listbox'];
	$exp = explode(",", $supID);
	$supID = $exp[0];
	$refnum = strip_tags($_POST['addref']);
	$date = strip_tags($_POST['adddategot']);
	$amount = strip_tags($_POST['addamount']);
	
	//select the highest number, if there is no IDs already define the base as 100
	$sql = "SELECT MAX(ReferenceNum) AS Highest FROM SupplierInvoices";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$highest = intval($row['Highest']);
	if($highest == 0)
	{
		$highest= $highest + 100;
	}
	else
	{
		$highest= $highest + 1;
	}
	//Insert query
	$sql = "Insert into SupplierInvoices (SupplierRefNum, ReferenceNum, SupplierID, Date, Amount) " .
			"VALUES ('" . $refnum . "', '" . $highest . "', '" . $supID . "', '" . $date . "', '" .  $amount . "')";

	if(!mysqli_query($con, $sql))
	{
		die("An Error in the SQL Query : " . mysqli_error($con));
	}
	
	mysqli_close($con);
?>
<form action = "NewInvoice.html.php" id="pageform" method="post"/>
	<input type="hidden"name="complete" value="true">
	<script type="text/javascript"> forceSubmit() </script>
</form>