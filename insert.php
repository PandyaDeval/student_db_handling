<html>
<link rel='stylesheet' href='styles.css'>
<body>
<pre>

<a href='index.php'><button>Home</button></a>

	<form name='form1' method='POST'>
		Name		<input type='text' name='name'/>
		
		Mobile		<input type='number' name='mobile'/>
		
		Gender		Male<input type='radio' name='gender' value='male'/> 	Female<input type='radio' name='gender' value='female'/>
		
		Semester	<input type='number' name='sem'/>
		
		email		<input type='email' name='email'/>
		
		
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

@$name=$_POST['name'];
@$mobile=$_POST['mobile'];
@$gender=$_POST['gender'];
@$sem=$_POST['sem'];
@$email=$_POST['email'];

$insert_data="INSERT INTO `ass3`(`name`,`mobile`,`gender`,`sem`,`email`) VALUES('$name','$mobile','$gender','$sem','$email')";
if(!mysqli_query($con,$insert_data)){
	mysqli_query($con,"CREATE TABLE `ass3`(id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(100), mobile bigint(10), gender VARCHAR(6), sem int(1), email VARCHAR(100))");
	mysqli_query($con,$insert_data);
}

echo "<script>alert('Record Inserted...'); </script>";
}

?>