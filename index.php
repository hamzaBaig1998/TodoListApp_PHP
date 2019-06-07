<!DOCTYPE html>
<html>
<head>
	<title>Todo List</title>
	<style>
		.btn{
			margin:auto;
			width:100%;
			color:#fff;
		}
		.close{
			cursor: pointer;
		}
		
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>


<?php
 include('connection.php');

 $query="SELECT * FROM todolist";
 $result=mysqli_query($conn,$query);
 
	if(isset($_POST['add'])){
		$todo=$_POST['todo'];
		$query="INSERT INTO todolist (id,todo) VALUE (NULL,'$todo')";
		$result=mysqli_query($conn,$query);
		if($result){
			header("Location: index.php");
		}
	}
	mysqli_close($conn);
?>
<div class="container">
	<div class="col-md-6 offset-md-3">
		<div class="display-3 my-4 text-center">Todo List</div>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="">
<input type="text" name="todo" class="form-control" placeholder="Enter item">
<button name="add" class="btn btn-primary my-2">Add</button>
</form>
<ul class="list-group">
	<?php
	if(mysqli_num_rows($result)>0){
 	while($row=mysqli_fetch_assoc($result)){
 		echo "<li class='list-group-item'>".$row['todo']."<a href='delete.php?id=".$row['id']."' class='close' data-dismiss='alert'>&times;</a> </li>";	
 	}
 }
	?>
</ul>
</div>
</div>
</body>
</html>