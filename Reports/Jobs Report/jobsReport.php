<?php session_start();
?>
<?php
include '../../Resources/PHP/db.inc.php';>
date_default_timezone_set('UTC'); 
$dateDisplay = date("d/m/Y");
$sql = "UPDATE Jobs SET TimeTaken = '$_POST[time]' WHERE JobDescription = '$_POST[listbox]' ";
$sql2 = "UPDATE Jobs SET AccountofWork = '$_POST[account]' WHERE JobDescription = '$_POST[listbox]' ";
$sql3 = "UPDATE Jobs SET Charge = '$_POST[charge]' WHERE JobDescription = '$_POST[listbox]' ";

$get=mysqli_query($con, "SELECT JobID FROM Jobs WHERE JobDescription = '$_POST[listbox]'"); 
$got = mysqli_fetch_array($get); 
$JobID = $got['JobID'];

$getb=mysqli_query($con, "SELECT StockID FROM Stock WHERE Description = '$_POST[listbox1]'"); 
$gotb = mysqli_fetch_array($getb); 
$StockID= $gotb['StockID'];

$getc=mysqli_query($con, "SELECT QuantityInStock FROM Stock WHERE Description = '$_POST[listbox1]'"); 
$gotc = mysqli_fetch_array($getc); 
$Quantity= $gotc['QuantityInStock'];

$getd=mysqli_query($con, "SELECT JobDescription FROM Jobs WHERE JobDescription = '$_POST[listbox]'"); 
$gotd = mysqli_fetch_array($getd); 
$Job= $gotd['JobDescription'];

$gete=mysqli_query($con, "SELECT Description FROM Stock WHERE Description = '$_POST[listbox1]'"); 
$gote = mysqli_fetch_array($gete); 
$Part= $gote['Description'];

$getf=mysqli_query($con, "SELECT CustomerID FROM Jobs WHERE JobDescription = '$_POST[listbox]'"); 
$gotf = mysqli_fetch_array($getf); 
$CustomerID= $gotf['CustomerID'];

$getg=mysqli_query($con, "SELECT FirstName FROM Customers WHERE CustomerID = '$CustomerID'"); 
$gotg= mysqli_fetch_array($getg); 
$FirstName= $gotg['FirstName'];

$geth=mysqli_query($con, "SELECT LastName FROM Customers WHERE CustomerID = '$CustomerID'"); 
$goth= mysqli_fetch_array($geth); 
$LastName= $goth['LastName'];

$MyQuantity = $_POST['quantity'];
$NewQuantity = $Quantity - $MyQuantity;

$geti=mysqli_query($con, "SELECT MAX(JobStockID) FROM JobStock"); 
$goti = mysqli_fetch_array($geti); 
$next_id = $goti['MAX(JobStockID)'] + 1;

$sql5 = "UPDATE Stock SET QuantityInStock = '$NewQuantity' WHERE Description = '$_POST[listbox1]' ";

$sql6 =  "Insert INTO JobStock(JobStockID,JobID,StockID,Quantity) VALUES('$next_id','$JobID','$StockID','$MyQuantity')";

if(! mysqli_query($con,$sql))
{
	echo "Error " . mysqli_error($con);
}
if(! mysqli_query($con,$sql2))
{
	echo "Error " . mysqli_error($con);
}
if(! mysqli_query($con,$sql3))
{
	echo "Error " . mysqli_error($con);
}

if(! mysqli_query($con,$sql5))
{
	echo "Error " . mysqli_error($con);
}
if(! mysqli_query($con,$sql6))
{
	echo "Error " . mysqli_error($con);
}
mysqli_close($con);
?>
<html>
	<head> 
		<link rel="icon" href="icon.jpg">
		<link rel="stylesheet" href="General.css">
		<link rel="stylesheet" href="job.css">
		<script type = "text/javascript" src = "completionOfJob.js"></script>
		<title align="center">
			Speed Shop - Invoice
		</title>
	</head>
	<header>
		<h1 class="header centerAlign">
			Speed Shop
		</h1> 
	</header>
	<body>
		<hr>
		 <nav>
		    <ul>
              <li class="dropdown">
                <a href="#" class="dropbtn">Bookings</a>
                  <div class="dropdown-content">
                    <a href="#">Make a Booking</a>
                    <a href="#">Cancel a Booking</a>
                  </div>
              </li>
		  
              <li class="dropdown">
                <a href="#" class="dropbtn">Jobs</a>
                  <div class="dropdown-content">
                    <a href="#">Commencement of Job</a>
                    <a href="#">Completion of Job</a>
                  </div>
              </li>
		  
		      <li class="dropdown">
                <a href="#" class="dropbtn">Stock Control</a>
                  <div class="dropdown-content">
                    <a href="">Reorder Stock</a>
			        <a href="">Reorder Letter</a>
			        <a href="">Receive Delivery</a>
                  </div>
              </li>
		  
              <li class="dropdown">
                <a href="#" class="dropbtn">Supplier Accounts</a>
                  <div class="dropdown-content">
				    <a href="">New Supplier Invoice</a>
			        <a href="">Payment to Supplier</a>
		    	    <a href="">Letter to Supplier</a>
                  </div>
		      </li>
			  
		      <li class="dropdown">
                <a href="#" class="dropbtn">File Maintenance</a>
                  <div class="dropdown-content">
			        <a href="">Add New Customer</a>
		    	    <a href="">Delete a Customer</a>
			        <a href="">Amend/View Customer</a>
	    		    <a href="">Add New Supplier</a>
		    	    <a href="">Delete a Supplier</a>
		    	    <a href="">Amend/View Supplier</a>
		    	    <a href="">Add New Stock Item</a>
		    	    <a href="">Delete a Stock Item</a>
		    	    <a href="">Amend/View Stock Item</a>
                 </div>
              </li>
		  
		      <li class="dropdown">
                <a href="#" class="dropbtn">Reports</a>
                  <div class="dropdown-content">
				    <a href="">Stock Status Report</a>
		    	    <a href="">Jobs Report</a>
		    	    <a href="">Unpaid Invoices Report</a>
                  </div>
              </li>
		  
		      <li class="dropdown">
                <a href="#" class="dropbtn">My Account</a>
                  <div class="dropdown-content">
				    <a href="">Change Password</a>
		    	    <a href="">Log Out</a>
		    	
                 </div>
              </li>
          </ul>
		</nav>
		<br>
		<hr>
		<br><br><br>
		<div class = "invoice" onsubmit = "return confirmSubmit()">
		<br>
			<?php
			echo "Customer ID: " . $CustomerID . "<br><br>";
			echo "Customer Name: " . $FirstName . " ";
			echo  $LastName . "<br><br>";
			echo "Job: " . $Job . "<br><br>";
			echo "Time Taken: " . $_POST['time']. "<br><br>";
			echo "Account of Work Done: " . $_POST['account']. "<br><br>";
			echo "Part: " . $Part. "<br><br>";
			echo "Quantity: " . $MyQuantity. "<br><br>";
			echo "Charge: &euro;" . $_POST['charge']. "<br><br>";
			echo "Date: " . $dateDisplay. "<br><br>";
			?>
		</div>
		<br><br>
		<div align = "center">
			<input class = "buttons2 marginRight1 marginLeft" type="button" value="Back" name="back" onclick = "history.go(-1);" />
			<input class = "buttons2 marginRight1" type="button" value="Help" name="help" onclick = "helpPrompt();"/>
			<input class = "buttons2 marginRight1 marginRight2" type="submit" value="Print" name="submit">
		</div>
		<br><br><br>
		<div class = "footer">Speed Shop 2017&reg;</div>
	</body>
</html>