<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
	$username = $_POST['username'];
  $password = md5($_POST['password']);

  
  include 'db.php';
  $db = new DB();
  $sql = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";

  $result = $db->query($sql);
  if($result){
    $affected_row = $db->getNumRows();
    if($affected_row == 1){
      $_SESSION['userlogin'] = true;
      $_SESSION['user'] = $db->getRow();
      $remember = isset($_POST['keeplogin'])?$_POST['keeplogin']:null;
      if($remember== 1){
        setcookie('remember',$_SESSION['user']['token'],time()+( 86400 * 5));
      } 
      header('location: index.php');
    
    }else{
      header('location: login.php?err=2');
    }
  }

	}
include 'header.php';
?>

	
<h2>Login</h2>

<?php if( isset($_GET['err']) && $_GET['err'] == 1){?>
	<div class="alert alert-danger" >
		<?php echo 'Please login to acess this page.';?>
	</div>
<?php }?>	


<?php if( isset($_GET['err']) && $_GET['err'] == 2){?>
  <div class="alert alert-danger" >
    <?php echo 'Invalid username or password.';?>
  </div>
<?php }?> 

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="keeplogin" value="1"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php include 'footer.php';?>