<?php
//echo md5('password');
//exit;
include 'session.php';
include 'usermodel.php';
include 'pagination.php';


if(!isset($_SESSION['userlogin'])){
	header('location: login.php?err=1');
}


$userModel = new Usermodel();
$total = $userModel->getTotalRecords();
//var_dump($total);

$pagination = new Pagination(5);
$page = isset($_GET['page'])? $_GET['page']:null;
$pagination->setLimit($total,$page);

$rows = $userModel->getUserList($pagination->limistart,$pagination->limit);

include 'header.php';

?>
<h2>User List</h2>
<hr>

<?php if( isset($_SESSION['message'])) {?>
	<div class="alert alert-success alert-dismissable" >
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php echo $_SESSION['message'];
			session_unset($_SESSION['message']);
		?>

	</div>
<?php } ?>

<a href="form.php" class="btn btn-primary">Add User</a>
<div style="float: right;">
	<small>Welcome <?php echo $_SESSION['user']['name'];?></small>
	<a href="logout.php" class="btn btn-danger">Logout</a>
</div>
		<br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>S.N</th>
					<th>Avatar</th>
					<th>Name</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$key=1;
				 foreach($rows as $row ){ ?>
				<tr>
					<td><?php echo $key++;?></td>
					<td>
						<?php if($row['image']){?>
						<img src="uploads/<?php echo $row['image'];?>" height="50" >	
						<?php }?>

					</td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['address'];?></td>
					<td><a  href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a>  <a onclick="return check()" href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
				</tr>
				<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<td colspan="4">
						
						 <ul class="pagination">
						 
						 <?php $pagination->getPage($total);?>	
						 
						</ul>
					</td>
				</tr>
			</tfoot>

		</table>

<script type="text/javascript">
	function check(){
		var result = confirm('Are you sure you want to delete this recored?');

		return result;



	}
</script>
<?php include 'footer.php';?>