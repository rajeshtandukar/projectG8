<?php
include 'session.php';
include 'db.php';

if(!isset($_SESSION['userlogin'])){
	header('location: login.php?err=1');
}
?>

<?php include('header.php');?>
<h2>New User</h2>
<hr>
	<form name="userForm" action="process.php" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Name</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Name">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Address</label>
			<textarea name="address" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Username</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Username">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
		
		
		<input type="submit" name="save" value="Save" class="btn btn-default">

	</form>
<?php include('footer.php');?>