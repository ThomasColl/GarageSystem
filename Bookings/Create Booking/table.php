<!DOCTYPE html>
<html>
<head>
<style>
table, td {
    border:1px solid black;
}
</style>
</head>
<body>

<p>Click on each tr element to alert its index position in the table:</p>

<table>
  <tr onclick="myFunction(this)">
    <td>Date</td>
    <td></td>
  </tr>
  <tr onclick="myFunction(this)">
    <td>Customer</td>
  </tr>
  <tr onclick="myFunction(this)">
    <td>Click to show rowIndex</td>
  </tr>
</table>

<script>
function myFunction(x)
{
    alert("Row index is: " + x.rowIndex);
    x.childNodes[3].innerHTML = "cust";
}
</script>
</body>
</html>
