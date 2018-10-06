<html>
<script>
function conditionfield1(){
	var conditionvalue=document.getElementById("conditionfield").value;
	
	if(conditionvalue=="none"){
		document.getElementById("conditiondata").innerHTML="";
	}
	else{
		document.getElementById("conditiondata").innerHTML="Old Value	<input type='text' name='old'/>";
	}
	
}

function changefield1(){
	var changevalue=document.getElementById("changefield").value;
	if(changevalue=="none"){
		document.getElementById("changedata").innerHTML="";
	}
	else if(changevalue=="all"){
		document.getElementById("changedata").innerHTML="New Values<br><br> Name		<input type='text' name='changename'/><br><br> Mobile		<input type='number' name='changemobile'/><br><br> Gender		<input type='text' name='changegender'/><br><br> Semester	<input type='number' name='changesem'/><br><br> email		<input type='text' name='changeemail'/>";
	}
	else{
		document.getElementById("changedata").innerHTML="New Value	<input type='text' name='new' />";
	}
}
</script>
<body>
<pre>

<a href='index.php'>Home</a>

<form method='POST'>
	<select onchange='conditionfield1()' name='conditionfield' id="conditionfield">
		<option value='none'>None</option>
		<option value='id'>Id</option>
		<option value='name'>Name</option>
		<option value='mobile'>Mobile</option>
		<option value='gender'>Gender</option>
		<option value='sem'>Semester</option>
		<option value='email'>Email</option>
	</select>
	
	<div id='conditiondata'></div>
	
	<select onchange='changefield1()' name='changefield' id="changefield">
		<option value='none'>None</option>
		<option value='all'>All</option>
		<option value='id'>Id</option>
		<option value='name'>Name</option>
		<option value='mobile'>Mobile</option>
		<option value='gender'>Gender</option>
		<option value='sem'>Semester</option>
		<option value='email'>Email</option>
	</select>
	
	<div id='changedata'></div>
	
	<input type='submit' name='submit'/>
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

$conditionfield=$_POST['conditionfield'];
$changefield=$_POST['changefield'];
if($conditionfield!='none'){
	$old=$_POST['old'];
	if($changefield=='all'){
		$name=$_POST['changename'];
		$mobile=$_POST['changemobile'];
		$gender=$_POST['changegender'];
		$sem=$_POST['changesem'];
		$email=$_POST['changeemail'];
		$update_qry="UPDATE `ass3` SET name='$name', mobile='$mobile', gender='$gender', sem='$sem', email='$email'  WHERE $conditionfield='$old'";
		if(mysqli_query($con,$update_qry)){
			echo "<script>alert('Records updated...');</script>";
		}
		else{
			echo "Cannot update...";
		}
		
	}
	else if($changefield!="none"){
		$new=$_POST['new'];
		$update_qry="UPDATE `ass3` SET $changefield='$new' WHERE $conditionfield='$old'";
		if(mysqli_query($con,$update_qry)){
			echo "<script>alert('Records updated...');</script>";
		}
		else{
			echo "Cannot update...";
		}
	}

}
else{
	echo "<script>alert('Please Enter a condition');</script>";
}

}


?>


