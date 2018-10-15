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
<link rel='stylesheet' href='styles.css'>
<body>
	<a href='insert.php'><button>Insert</button></a>
	<a href='update.php'><button>Update</button></a>
	<a href='delete.php'><button>Delete</button></a><br><br><br>
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