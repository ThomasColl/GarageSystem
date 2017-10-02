<?php session_start();
?>
<?php
include '../../Resources/PHP/db.inc.php';
$sql = "UPDATE Suppliers SET DeleteFlag = '1' WHERE SupplierID = '$_POST[delid]' ";

if(! mysqli_query($con,$sql))
{
	echo "Error " . mysqli_error($con);
}

mysqli_close($con);
?>
<form action = "DeleteSupplier.html.php" method = "post" id = "previous">
<input style = "display:none;" type = "submit">
</form>
<?php
echo "<script>alert(\"The following details were deleted sucessfully\");</script>";
echo "<script>document.getElementById(\"previous\").submit();</script>";
?>