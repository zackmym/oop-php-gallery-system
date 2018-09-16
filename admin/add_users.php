    <?php require_once('includes/admin_header.php') ?>
    <?php  if(!$session->is_logged_in()) {redirect_to("../admin/login.php");} ?>

    <?php 

    

    	
     ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->


            
           <?php require_once('includes/top_nav.php'); ?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include('includes/admin_sidebar.php'); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <?php 
      	  $user = new User();
          if(isset($_POST['add_user'])) {
              
              $user->username = $_POST['username'];
              $user->first_name = $_POST['first_name'];
              $user->last_name = $_POST['last_name'];
              $user->password = $_POST['password'];
              $user->set_file($_FILES['user_image']);

              if($user->save()) {
                echo 'user added successfully';
              } else {
                echo 'user creation failed';
              }
          }
         ?>







    <div id="page-wrapper">

		<div class="container-fluid">
		    <!-- Page Heading -->
		    <div class="row">
		        <div class="col-lg-12">
		            <h1 class="page-header">
		                Add User
		               
		            </h1>
		            <form action="" method="post" enctype="multipart/form-data">
		            	<div class="col-md-6 col-md-offset-3">
		            		
		            			<div class="form-group">
		            				<label for="username">Username</label>
		            				<input type="text" name="username" class="form-control" value="<?php //echo $photo->title; ?>">
		            			</div>

		            			<!-- <div class="form-group">
		            				<a href="" class="thumbnail"><img src="<?php //echo $photo->picture_path(); ?>" alt="" ></a>
		            			</div> -->

		            			<div class="form-group">
		            				<label for="first_name">First Name</label>
		            				<input type="text" name="first_name" class="form-control" value="<?php //echo $photo->caption; ?>">
		            			</div>

		            			<div class="form-group">
		            				<label for="last_name">Last Name</label>
		            				<input type="text" name="last_name" class="form-control" value="<?php //echo $photo->alternate_text; ?>">
		            			</div>

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php //echo $photo->alternate_text; ?>">
                      </div>

		            			<div class="form-group">
		            				<label for="image">image</label>
		            		  	<input type="file" name="user_image">
		            			</div>

                      <input type="submit" name="add_user" value="Create" class="btn btn-primary pull-right" >



		            			<!-- <div class="form-group">
		            				<label for="caption">Caption</label>
		            				<input type="text" name="title" class="form-control">
		            			</div> -->
		            	
		            	</div>


                	</form>



		        </div>
		    </div>
		    <!-- /.row -->

		</div>
            <!-- /.container-fluid -->

    </div>
        <!-- /#page-wrapper -->
<?php require_once('includes/admin_footer.php'); ?>
