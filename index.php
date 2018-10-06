<?php
$con=mysqli_connect("localhost","root","") or die("cannot connect...");
if(!mysqli_select_db($con,"u16co010")){
	mysqli_query($con,"CREATE DATABASE u16co010");
	mysqli_select_db($con,"u16co010");
}

$fetch_data="SELECT * FROM `ass3`";
$data=mysqli_query($con,$fetch_data);
$count_qry="SELECT COUNT(*) FROM `ass3`";
$count=mysqli_fetch_row(mysqli_query($con,$count_qry));
$count=$count[0];

echo "<html>
<style>
td,th{
	width:150px;
	text-align:left;
	padding:5px;
}
</style>
<body>
	<a href='insert.php'>Insert</a><br>
	<a href='update.php'>Update</a><br>
	<a href='delete.php'>Delete</a><br><br><br>
	<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Mobile</th>
		<th>Gender</th>
		<th>Semester</th>
		<th>Email</th>
	</tr>";
	
while($count>0){
	$row=mysqli_fetch_row($data);
	echo "<tr>
		<td>$row[0]</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[5]</td>
	</tr>";
	$count-=1;
}
	
	echo "</table>
</body>
</html>";
?>