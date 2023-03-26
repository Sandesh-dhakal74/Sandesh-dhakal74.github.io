<?php
include("testgarna.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
include("connectiontest.php");

error_reporting(0);
?>

<html>
<head>
</head>
<body>
<form action="" method="">
firstname: <input type ="text" name ="fname" value=""/><br>
lastname: <input type ="text" name ="lname" value=""/><br>
address: <input type ="text" name ="address" value=""/><br>

email: <input type ="text" name ="email" value=""/><Br>
 <input type ="submit" name ="submit" value="submit"/><br>
 </form>
</body>
</html>

<?php
if($_GET['submit'])
{
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$address=$_GET['address'];
	//echo $address;
	$email=$_GET['email'];
	if($fname!="" && $lname!="" && $address!="" &&  $email!="")
	{
		
		$query="INSERT INTO studentinfo (fname,lname,address,email)VALUES('$fname','$lname','$address','$email')";
		echo $query;
		$data=mysqli_query($conn,$query);
		if ($data)
		{
			echo "DATA inserted successfully";
	?>
	<!-- <META HTTP-EQUIV="refresh"  CONTENT="0; URL=http://localhost/testinsert.php"> -->
	<?php
	
	
		}
		
	}
	else
	{
		echo "All fields are required";
	}

}
?>

</body>
</html>