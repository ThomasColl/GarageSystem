<?php
include '../../Resources/PHP/db.inc.php';
date_default_timezone_set('UTC'); 
$dateDisplay = date("Y-m-d");

$sql = "SELECT * FROM Jobs WHERE Date = '" . $dateDisplay . "' AND AccountofWork = 'Empty'";

if(!$result = mysqli_query($con, $sql))
{
	die('Error in querying the database' . mysqli_error($con));
}
echo "<label for = list>Select Job From List:</label>";
echo "<select name = 'listbox' class = 'inputP' id = 'listbox' onclick = 'populate()'>";
while($row = mysqli_fetch_array($result))
{
	$JobDescription = $row['JobDescription'];
	$allText = "$JobDescription";
	echo"<option value = '$allText'>$JobDescription</option>";
}
echo "</select>";
mysqli_close($con);
?>