<?php
$id=$_GET['id'];
include("connection.php");
$query="DELETE FROM todolist WHERE id='$id'";
$result=mysqli_query($conn,$query);
if($result){
	header("Location:index.php");
}
mysqli_close($conn);
?>