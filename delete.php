<html>
<link rel='stylesheet' href='styles.css'>
<script>
function textfield(){
	var value=document.getElementById("field").value;
	if(value=="all"){
		document.getElementById("condition").innerHTML="";
	}
	else{
		document.getElementById("condition").innerHTML="Condition <input type='text' name='condition'/>";
	}
}
</script>
<body>
<pre>

<a href='index.php'><button>Home</button></a>

<form method='POST'>
	<select onchange='textfield()' name='field' id="field">
		<option value='all'>All</option>
		<option value='id'>Id</option>
		<option value='name'>Name</option>
		<option value='mobile'>Mobile</option>
		<option value='gender'>Gender</option>
		<option value='sem'>Semester</option>
		<option value='email'>Email</option>
	</select>
	
	<div id='condition'></div>
	
	<input class='xyz' type='submit' name='submit'/>
</form>

</pre>
</body>
</html>


<?php

if(isset($_POST['submit'])){
	
	$con=mysqli_connect("localhost","root","") or die("cannot connect...");
if(!mysqli_select_db($con,"u16co010")){
	mysqli_query($con,"CREATE DATABASE u16co010");
	mysqli_select_db($con,"u16co010");
}

$field=$_POST['field'];
if($field=='all'){
	$delete_qry="DELETE FROM `ass3`";
	if(mysqli_query($con,$delete_qry)){
		echo "<script>alert('Records Deleted...');</script>";
	}
	else{
		echo "Cannot delete...";
	}
}
else{
	$condition=$_POST['condition'];
	$delete_qry="DELETE FROM `ass3` WHERE $field='$condition'";
	if(mysqli_query($con,$delete_qry)){
		echo "<script>alert('Records Deleted...');</script>";
	}
	else{
		echo "Cannot delete...";
	}
}
}


?>