    <?php require_once('includes/admin_header.php') ?>
    <?php if(!$session->is_logged_in()) {redirect_to("../admin/login.php");} ?>

    <?php 
    	$message = '';
    	if(isset($_POST['submit'])) {
    		//echo "<h1 style='color:white'>wOrKeD</h1>";
    		$photo = new Photo();
    		$photo->title = $_POST['title'];
    		$photo->set_file($_FILES['file_upload']);

    		if($photo->save()) {
    			$message = "Photo Uploaded successfully";
    		} else {
    			$message = join('<br', $photo->errors);
    		}
    	}

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







    <div id="page-wrapper">

		<div class="container-fluid">
		    <!-- Page Heading -->
		    <div class="row">
		        <div class="col-lg-12">
		            <h1 class="page-header">
		                UPLOAD
		                <small>Subheading</small>
		            </h1>
		           <!--  <ol class="breadcrumb">
		                <li>
		                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
		                </li>
		                <li class="active">
		                    <i class="fa fa-file"></i> Blank Page
		                </li>
		            </ol> -->
		            <div class="col-md-6">
		            	<?php echo $message; ?>
		            	<form action="" method="post" enctype="multipart/form-data">
		            	<div class="form-group">
		            		<input type="text" name="title" class="form-control">
		            	</div>

		            	<div class="form-group">
		            		<input type="file" name="file_upload">
		            	</div>
		            	
		            	<input type="submit" name="submit" value="submit" class="btn btn-primary">
		            	
		            </form>
		            </div>
		            
		        </div>
		    </div>
		    <!-- /.row -->

		</div>
            <!-- /.container-fluid -->

    </div>
        <!-- /#page-wrapper -->

    <?php require_once('includes/admin_footer.php') ?>
