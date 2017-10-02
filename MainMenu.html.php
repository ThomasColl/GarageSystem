<!DOCTYPE html>
<html>
	<head>  

		<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
		<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css">
		<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/MainMenu.css">
		<title align="center">
			Speed Shop - Main Menu
			<br> <text align =" right" >
				logout 
		</title>
	</head>
	<body>
	  <header>
		<h1 class="header centerAlign">Speed Shop</h1>
        <hr><!-- this is the breaker for the header of the menu screen and reads speed shop -->
        <h2 class="Account">Main Menu</h2>		
		<ul class = "logout">
		    <li class="dropdown">
                <a class ="Alpha" href="#" class="dropbtn">My Account</a>
					<div class="dropdown-content">
					
					<a href="http://garage.candept.com/LoginScreen/ChangePassword.html.php">ChangePassword</a>
					<a href="http://garage.candept.com/LoginScreen/LoginChangePassword.html.php">Log Out</a>
                </div>
            </li>
          </ul>
		<hr>
		
        <hr class= "Invisible">
		<?php include 'Resources/PHP/LoggedInAndCurrentTime.php';?>
	  </header>
	  <nav id="mainMenuNav">
		      <ul>
			  <li><h3>Bookings</h3></li>
                <li><a href="http://garage.candept.com/Bookings/Create%20Booking/MakeBooking.html.php" class="topMenuItem">Make a Booking</a></li>
                <li><a href="http://garage.candept.com/Bookings/CancelBooking/CancelBooking.html.php">Cancel a Booking</a></li>
              </ul>
		      <ul>
			    <li><h3>Jobs</h3></li>
                <li><a href="http://garage.candept.com/Jobs/JobCommencement/JobCommencement.html.php" class="topMenuItem">Job Commencement</a></li>
                <li><a href="http://garage.candept.com/Jobs/Completion%20of%20Job/Completionof%20Job.html.php">Job Completion</a></li>
              </ul>
		      <ul>
			    <li><h3>Stock Control</h3></li>
                <li><a href="http://garage.candept.com/Stock%20Control/ReorderStock/ReorderStock.html.php" class="topMenuItem">Reorder Stock</a></li>
			    <li><a href="http://garage.candept.com/Stock%20Control/Receive%20Deliveries/ReceiveDeliveries.html.php">Receive Delivery</a></li>
              </ul>
		      <ul>
			    <li><h3>Supplier Accounts</h3>
				<li><a href="http://garage.candept.com/Supplier%20Accounts/NewInvoice/NewInvoice.html.php" class="topMenuItem">New Supplier Invoice</a></li>
			    <li><a href="http://garage.candept.com/Supplier%20Accounts/PaymentToSupplier/PaymentToSupplier.html.php">Payment to Supplier</a></li>
              </ul>
	          <ul>
			    <li><h3>File Maintenance</h3></li>
			    <li><a href="http://garage.candept.com/File%20Maintenance/Add%20Customer/AddCustomer.html.php" class="topMenuItem">Add New Customer</a></li>
		    	<li><a href="http://garage.candept.com/File%20Maintenance/Delete%20Customer/DeleteCustomer.html.php">Delete a Customer</a></li>
			    <li><a href="http://garage.candept.com/File%20Maintenance/AmendView%20Customer/AmendViewCustomer.html.php">Amend/View Customer</a></li>
	    		<li><a href="http://garage.candept.com/File%20Maintenance/Add%20Supplier/AddSupplier.html.php">Add New Supplier</a></li>
		    	<li><a href="http://garage.candept.com/File%20Maintenance/Delete%20Supplier/DeleteSupplier.html.php">Delete a Supplier</a></li>
		    	<li><a href="http://garage.candept.com/File%20Maintenance/AmendView%20Supplier/AmendView.html.php">Amend/View Supplier</a></li>
		    	<li><a href="http://garage.candept.com/File%20Maintenance/add%20stock/addStockItem.html.php">Add New Stock Item</a></li>
		    	<li><a href="http://garage.candept.com/File%20Maintenance/Delete%20stock/deleteStockItem.html.php">Delete a Stock Item</a></li>
		    	<li><a href="http://garage.candept.com/File%20Maintenance/AmendViewStock/AmendViewStock.html.php">Amend/View Stock Item</a></li>
              </ul>
			  <ul>
			    <li><h3>Reports</h3></li>
				<li><a href="http://garage.candept.com/Reports/StockReport/StockReport.html.php" class="topMenuItem">Stock Status Report</a></li>
		    	<li><a href="http://garage.candept.com/Reports/Jobs%20Report/JobsReport.html.php">Jobs Report</a></li>
              </ul>	
	    </nav><hr>
		<div class="footer">Speed Shop 2017&reg;</div>
    </body>
</html>