<?php
include 'session.php';
include 'db.php';

if(!isset($_SESSION['userlogin'])){
	header('location: login.php?err=1');
}
?>

<?php include('header.php');?>
<style type="text/css">
	.input_error{
		border: 1px solid red;
	}
</style>
<h2>New User</h2>
<hr>

	<div id="error_div" class="alert alert-danger" style="display: none;">

	</div>
	<form name="userForm"  action="process.php" method="post" enctype="multipart/form-data" onsubmit=" return validation()">
		<div class="form-group">
			<label for="exampleInputEmail1">Name <span style="color:red;">*</span></label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Name">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Address</label>
			<textarea name="address" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Username<span style="color:red;">*</span></label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Username">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Password<span style="color:red;">*</span></label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>


		<div class="form-group">
			<label for="exampleInputEmail1">Image</label>
			<input type="file" id="image" name="image" >
		</div>
		
		
		<input type="submit" name="save" value="Save" class="btn btn-default">

	</form>
<?php include('footer.php');?>