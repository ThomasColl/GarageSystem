<?php
include '../../Resources/PHP/db.inc.php';
$get=mysqli_query($con, "SELECT MAX(SupplierID) FROM Suppliers"); 
$got = mysqli_fetch_array($get); 
$next_id = $got['MAX(SupplierID)'] + 1;

$sql =  "Insert INTO Suppliers (SupplierID, SupplierName, Street, Town, County, Telephone, Website, Email)
VALUES('$next_id','$_POST[name]','$_POST[street]','$_POST[town]','$_POST[county]','$_POST[phone]','$_POST[website]','$_POST[email]')";



if(!mysqli_query($con, $sql))
{
die ("An error in the SQL Query: " . mysqli_error($con));
}
mysqli_close($con);
?>
<form action = "AddSupplier.html.php" method = "post" id = "previous">
<input style = "display:none;" type = "submit">
</form>
<?php
echo "<script>alert(\"The following details were added sucessfully\");</script>";
echo "<script>document.getElementById(\"previous\").submit();</script>";
?>