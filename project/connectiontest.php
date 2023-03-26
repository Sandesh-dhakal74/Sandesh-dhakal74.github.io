<?php
$servername="localhost";
$username="root";
$password="";
$dbname="admission";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	// echo "database connected successfully";
	
}
else
{
die("connection fail because ".mysqli_connect_error());

}

?>
