<?php session_start();
?>
<?php include '../../Resources/PHP/db.inc.php';//Connection to the database.

$sql = "UPDATE Orders SET Delivered = '1' WHERE OrderID = '$_POST[recID]' ";

$getc=mysqli_query($con, "SELECT QuantityInStock FROM Stock WHERE Description = '$_POST[recDescription]'"); 
$gotc = mysqli_fetch_array($getc); 
$Quantity= $gotc['QuantityInStock'];

$MyQuantity = $_POST['recQuantity'];
$NewQuantity = $Quantity + $MyQuantity;

$sql2= "UPDATE Stock SET QuantityInStock = '$NewQuantity' WHERE Description = '$_POST[recDescription]' ";

if(! mysqli_query($con,$sql))
{
	echo "Error " . mysqli_error($con);
}

if(! mysqli_query($con,$sql2))
{
	echo "Error " . mysqli_error($con);
}
mysqli_close($con);
?>
<form action = "selectOrder.html.php" method = "post" id = "previous">
<input style = "display:none;" type = "submit">
</form>
<?php
echo "<script>alert(\"The following details were changed sucessfully\");</script>";
echo "<script>document.getElementById(\"previous\").submit();</script>";
?>

