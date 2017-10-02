<link rel="stylesheet" href="General.css">
<?php
	session_start();
	echo "<nav>
         <ul class=\"menuBar\">
            <li class=\"dropdown\">
               <a href=\"\" class=\"dropbtn\">Bookings</a>
               <div class=\"dropdown-content\">
                  <a href=\"http://garage.candept.com/Bookings/Create%20Booking/MakeBooking.html.php\">Make a Booking</a>
                  <a href=\"http://garage.candept.com/Bookings/CancelBooking/CancelBooking.html.php\">Cancel a Booking</a>
               </div>
            </li>
            <li class=\"dropdown\">
               <a href=\"\" class=\"dropbtn\">Jobs</a>
               <div class=\"dropdown-content\">
                  <a href=\"http://garage.candept.com/Jobs/JobCommencement/JobCommencement.html.php\">Commencement of Job</a>
                  <a href=\"http://garage.candept.com/Jobs/Completion%20of%20Job/Completionof%20Job.html.php\">Completion of Job</a>
               </div>
            </li>
            <li class=\"dropdown\">
               <a href=\"\" class=\"dropbtn\">Stock Control</a>
               <div class=\"dropdown-content\">
                  <a href=\"http://garage.candept.com/Stock%20Control/ReorderStock/ReorderStock.html.php\">Reorder Stock</a>
                  <a href=\"http://garage.candept.com/Stock%20Control/Receive%20Deliveries/ReceiveDeliveries.html.php\">Receive Delivery</a>
               </div>
            </li>
            <li class=\"dropdown\">
               <a href=\"\" class=\"dropbtn\">Supplier Accounts</a>
               <div class=\"dropdown-content\">
                  <a href=\"http://garage.candept.com/Supplier%20Accounts/NewInvoice/NewInvoice.html.php\">New Supplier Invoice</a>
                  <a href=\"http://garage.candept.com/Supplier%20Accounts/PaymentToSupplier/PaymentToSupplier.html.php\">Payment to Supplier</a>
               </div>
            </li>
            <li class=\"dropdown\">
               <a href=\"\" class=\"dropbtn\">File Maintenance</a>
               <div class=\"dropdown-content\">
                  <a href=\"http://garage.candept.com/File%20Maintenance/Add%20Customer/AddCustomer.html.php\">Add New Customer</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/Delete%20Customer/DeleteCustomer.html.php\">Delete a Customer</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/AmendView%20Customer/AmendViewCustomer.html.php\">Amend/View Customer</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/Add%20Supplier/AddSupplier.html.php\">Add New Supplier</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/Delete%20Supplier/DeleteSupplier.html.php\">Delete a Supplier</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/AmendView%20Supplier/AmendView.html.php\">Amend/View Supplier</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/add%20stock/addStockItem.html.php\">Add New Stock Item</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/Delete%20stock/deleteStockItem.html.php\">Delete a Stock Item</a>
                  <a href=\"http://garage.candept.com/File%20Maintenance/AmendViewStock/AmendViewStock.html.php\">Amend/View Stock Item</a>
               </div>
            </li>
            <li class=\"dropdown\">
               <a href=\"\" class=\"dropbtn\">Reports</a>
               <div class=\"dropdown-content\">
                  <a href=\"http://garage.candept.com/Reports/StockReport/StockReport.html.php\">Stock Status Report</a>
                  <a href=\"http://garage.candept.com/Reports/Jobs%20Report/JobsReport.html.php\">Jobs Report</a>
               </div>
            </li>
            <li class=\"dropdown\">
               <a href=\"\" class=\"dropbtn\">My Account</a>
               <div class=\"dropdown-content\">
                  <a href=\"http://garage.candept.com/LoginScreen/ChangePassword.html.php\">Change Password</a>
                  <a href=\"http://garage.candept.com/LoginScreen/LoginChangePassword.html.php\">Log Out</a>
               </div>
            </li>
         </ul>
      </nav>"
?>