<?php require_once("includes/admin_header.php"); ?>
<?php //require_once("../admin/includes/admin_header.php"); ?>
<?php 
	if($session->is_logged_in()) {
		redirect_to("index.php");
	}



	if(isset($_POST['submit'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		//method to check database user
		$user_found = User::verify_user($username, $password);
 

		if($user_found) {
			$session->login($user_found);
			redirect_to("index.php");

		} else {
			$message = 'username or password is incorrect';
		}

	} else {
		$username = null;
		$password = null;
		$message = ""; 
	}

 ?>


<div class="col-md-4 col-md-offset-4">

	<h4 class="bg-danger"><?php echo $message; ?></h4>
		
	<form id="login-id" action="" method="post">
		
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" value="<?php //echo htmlentities($username); ?>" >

	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" value="<?php //echo htmlentities($password); ?>">
		
	</div>


	<div class="form-group">
	<input type="submit" name="submit" value="Submit" class="btn btn-primary">

	</div>


	</form>


</div>