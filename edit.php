<?php
include 'session.php';
include 'db.php';
if(!isset($_SESSION['userlogin'])){
	header('location: login.php?err=1');
}
?>

<?php include('header.php');
	
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_users WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

	

?>
	
	<form name="userForm" action="process.php" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Name</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $row['name'];?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Address</label>
			<textarea name="address" class="form-control"><?php echo $row['address'];?></textarea>
		</div>

		<input type="hidden" name="id" value="<?php echo $id;?>">
		
		<input type="submit" name="save" value="Save" class="btn btn-default">

	</form>
	
<?php include('footer.php');?>