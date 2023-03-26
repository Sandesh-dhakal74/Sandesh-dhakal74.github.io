<?php
include("connectiontest.php");
$SN=$_GET['rn'];
$query="DELETE from studentinfo where SN='$SN'";
$data=mysqli_query($conn,$query);
if($data)
{
	echo "record deleted successfully";
	
?>
	<META HTTP-EQUIV="refresh"  CONTENT="0; URL=http://localhost/testdisplay.php">
	<?php
	
	
}
else
{
	echo "sorry , deleted process failed";
}
?>
