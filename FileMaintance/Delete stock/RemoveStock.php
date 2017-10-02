<script type="text/javascript" src="deleteStock.js"></script>
<?php
	 /* 
		//Name: Cathal Brady
		//Student Number: C00202493
	 */
	 
include '../../Resources/PHP/db.inc.php';/// includes the database

	// sql to update the delete flag to 1 
	$sql = "UPDATE Stock SET DeleteFlag = 1 WHERE  StockID ='$_POST[StockID]' ";
	
	if(!mysqli_query($con, $sql))
	{
		echo "Error " . mysqli_error($con);// if there is a problem print out an error
	}
	else
	{	
		
		if(mysqli_affected_rows($con) != 0)// if there is no problem 
		
		{
			// will output this
			echo mysqli_affected_rows($con) . " record(s) updated <br>";
			echo "The Stock for " . $_POST['SupplierID'] . "with the id of " . $_POST['StockID'] . " has been removed";
		}
		else
		{
			
			echo "No records were changed";// output this 
		}
	}
	
	mysqli_close($con);// closes connection
?><!-- connects back to the home page--->
<form action = "deleteStockItem.html.php" id="pageform" method="post"/>
	<script type="text/javascript">alert("The Stock has been Removed")</script>
	<script type="text/javascript">document.getElementById("pageform").submit()</script>
</form>



