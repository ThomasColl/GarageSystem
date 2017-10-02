<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<!-- Include the javascript to perform a forceSubmit() -->
<script type="text/javascript" src="AmendView.js"></script>
<?php
	//include db.inc.php 
	include '../../Resources/PHP/db.inc.php';
	$site = strip_tags($_POST['amendwebsite']);
	//define the new sql with the new variables
	$sql = "UPDATE Suppliers SET SupplierName = '$_POST[amendname]'  ,
			Street = '$_POST[amendaddressStreet]' , 
			Town = '$_POST[amendaddressTown]' ,
			County = '$_POST[amendaddressCounty]' ,
			Telephone = '$_POST[amendtelephone]' ,
			Website = '$site' ,
			Email = '$_POST[amendemail]' WHERE SupplierID = '$_POST[amendid]' ";
			
	//if the query fails then kill the php
	if(!mysqli_query($con, $sql))
	{
		die('Error ' . mysqli_error($con));
	}
	else
	{
		// display effected rows
		if(mysqli_affected_rows($con) != 0)
		{
			echo mysqli_affected_rows($con) . " record(s) updated <br>";
			echo "Supplier ID " . $_POST['amendid'] . ", " . $_POST['amendname'] . " has been updated";
		}
		else
		{
			echo "No records were changed";
		}
	}
	
	mysqli_close($con);
?>
<!-- force submit -->
<form action = "AmendView.html.php" id="pageform" method="post"/>
	<input name="complete" value="true">
	<script type="text/javascript"> forceSubmit() </script>
</form>