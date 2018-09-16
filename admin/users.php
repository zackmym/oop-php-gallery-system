    <?php require_once('includes/admin_header.php') ?>
    <?php  if(!$session->is_logged_in()) {redirect_to("../admin/login.php");} ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->


            
           <?php require_once('includes/top_nav.php'); ?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include('includes/admin_sidebar.php'); ?>

            <!-- /.navbar-collapse -->
        </nav>







    <div id="page-wrapper">

		<div class="container-fluid">
		    <!-- Page Heading -->
		    <div class="row">
		        <div class="col-lg-12">
		            <h1 class="page-header">
		                Users
		                
		            </h1>
		            <a href="add_users.php" class="btn btn-primary">Add User</a>
		            	
		            	<div class="col-md-12">
		            		<table class="table table-hover">
		            			<thead>
		            				<tr>
		            					<th>User_Id</th>
		            					<th>User Photo</th>
		            					<th>Username</th>
		            					<th>FirstName</th>
		            					<th>LastName</th>
		            					<!-- <th>Size</th> -->
		            				</tr>
		            			</thead>


		            			<tbody>
		            				<?php $users = User::find_all(); 
		            				foreach($users as $user) : ?>
		            				
		            				<tr>
		            					<td><?php echo $user->id; ?></td>
		            					<td> <img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt = "picture">  

		            					 <div class="user_link">
		            						
		            						<a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
		            						<a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
		            					</div> 


		            					</td>

		            					

		            					
		            					<td><?php echo $user->username; ?></td>
		            					<td><?php echo $user->first_name; ?></td>
		            					<td><?php echo $user->last_name; ?></td>
		            				</tr>
		            			<?php endforeach; ?>
		            			</tbody>
		            		</table> <!-- end of table -->


		            	</div>


		        </div>
		    </div>
		    <!-- /.row -->

		</div>
            <!-- /.container-fluid -->

    </div>
        <!-- /#page-wrapper -->
<?php require_once('includes/admin_footer.php'); ?>
