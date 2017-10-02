<?php	
//Name: Cathal Brady
//Student Number: C00202493
	
	include '../../Resources/PHP/db.inc.php';// include the database
	
	$sql = "UPDATE Stock SET ReorderLevel = '$_POST[ReorderLevel]' ,
			
			ReorderQuantity = '$_POST[ReorderQuantity]' ,
			CostPrice = '$_POST[CostPrice]' ,
			RetailPrice = '$_POST[RetailPrice]' WHERE StockID='$_POST[StockID]'";// the sql query to up date the stock tablwe with the new adjustments to the table
				
	if(!mysqli_query($con, $sql))
	{
		echo "Error " . mysqli_error($con);//  if there is an error in the query 
	}
	else
	{
		if(mysqli_affected_rows($con) != 0)
		{
			echo mysqli_affected_rows($con) . " record(s) updated <br>";
		}
		else
		{
			echo "No records were changed";// else echo this 
		}
	}
	mysqli_close($con);
?>
<form action = "AmendViewStock.html.php" id="pageform" method="post"/>

	<script type="text/javascript">alert("The Stock has been updated")</script>
	<script type="text/javascript">document.getElementById("pageform").submit()</script>
</form>
