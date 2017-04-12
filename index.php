<?php
include 'session.php';
include 'db.php';

//print_r($_SESSION['user']);

if(!isset($_SESSION['userlogin'])){
	header('location: login.php?err=1');
}


$limit = 5; // per page;
$page = isset($_GET['page'])?$_GET['page']:1;
if($page == 1){
	$limistart=0;	
}else{
	$limistart= ($page-1) * $limit;
}

$sql = "SELECT count(*) AS total FROM tbl_users ";
$result = mysqli_query($conn, $sql);
$record = mysqli_fetch_assoc($result);
$total = $record['total'];
$totalpages = ceil($total/$limit);





$sql = "SELECT * FROM tbl_users LIMIT $limistart,$limit";
$result = mysqli_query($conn,$sql);

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
					<th>Name</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$key=1;
				 while($row = mysqli_fetch_assoc($result) ){ ?>
				<tr>
					<td><?php echo $key++;?></td>
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
						 <?php if($page !=1){?>
						 <li><a href="index.php?page=1">&lt;&lt;</a></li>
						 <?php }?>
						 <?php 

						 for($i=1;$i<=$totalpages;$i++) {
						 	$class = ($page== $i)? 'active':'';	
						 	?>
								
							<li class="<?php echo $class;?>">
							
							<?php if($page == $i){	?>
								<a ><?php echo $i;?></a>
							<?php }else{?>
								<a href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a>
							<?php }?>
							</li>				 		
						 <?php }?>
						 <?php if($page != $totalpages){?>
						<li><a href="index.php?page=<?php echo $totalpages;?>">&gt;&gt;</a></li>
						<?php }?>
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