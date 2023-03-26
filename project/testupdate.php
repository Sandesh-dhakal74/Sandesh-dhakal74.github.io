<?php
include("connectiontest.php");

	if(isset($_GET['submit']))
	{
		$r= $_GET['SN'];
		$f=$_GET['fname'];
		$l=$_GET['lname'];
		$a= $_GET['address'];
		$e=$_GET['email'];
		$query="update studentinfo set fname='$f', lname='$l', address='$a', email='$e' where SN='$r'";
		$data=mysqli_query($conn,$query);
		if ($data)
		{
			echo "record update successfully";
			?>
	<META HTTP-EQUIV="refresh"  CONTENT="0; URL=http://localhost/testdisplay.php">
	<?php
	
		}
		else
		{
			echo " record not updated ";
		}
	
	}

?>
<html>
<head>
</head>
<body>
<form action="" method="GET">
SN : <input type ="text" name ="SN" readonly value="<?php echo $_GET['SN'];?>"/><br>
Firstname: <input type ="text" name ="fname" value="<?php echo $_GET['fname'];?>"/><br>
Lastname: <input type ="text" name ="lname" value="<?php echo $_GET['lname'];?>"/><br>
Address: <input type ="text" name ="address" value="<?php echo $_GET['address'];?>"/><br>

email: <input type ="text" name ="email" value="<?php echo $_GET['email'];?>"/><br>
 <input type ="submit" name ="submit" value="submit"/><br>
 </form>
</body>
</html>
