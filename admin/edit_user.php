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

        if(empty($_GET['id'])) {

          redirect_to('users.php');

        } else {

          $user = User::find_by_id($_GET['id']);

          if(isset($_POST['update'])) {

            if($user) {

              $user->username = $_POST['username'];
              $user->first_name = $_POST['first_name'];
              $user->last_name = $_POST['last_name'];
              $user->password = $_POST['password'];

              if(empty($_FILES['user_image'])) {

                $user->save();

              } else {

                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $user->save();

                redirect_to("edit_user.php?id={$user->id}");
              }
              

          
              
          }
        }
      }



         ?>







    <div id="page-wrapper">

		<div class="container-fluid">
		    <!-- Page Heading -->
		    <div class="row">
		        <div class="col-lg-12">
		            <h1 class="page-header">
		                Update User
		            </h1>

                <div class="col-md-6">

                  <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt = "picture">

                </div>


		            <form action="" method="post" enctype="multipart/form-data">
		            	<div class="col-md-6 ">

                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="user_image">
                      </div>
		            		
		            			<div class="form-group">
		            				<label for="username">Username</label>
		            				<input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
		            			</div>

		            			<!-- <div class="form-group">
		            				<a href="" class="thumbnail"><img src="<?php //echo $photo->picture_path(); ?>" alt="" ></a>
		            			</div> -->

		            			<div class="form-group">
		            				<label for="first_name">First Name</label>
		            				<input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
		            			</div>

		            			<div class="form-group">
		            				<label for="last_name">Last Name</label>
		            				<input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
		            			</div>

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                      </div>

		            		
                        <div class="info-box-delete pull-left">
                                    <a  href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>  
                      <!-- <input type="submit" name="update" value="Update" class="btn btn-primary pull-right" > -->



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
