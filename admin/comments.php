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
		                Comments
		                
		            </h1>
		            <!-- <a href="add_users.php" class="btn btn-primary">Add User</a> -->
		            	
		            	<div class="col-md-12">
		            		<table class="table table-hover">
		            			<thead>
		            				<tr>
		            					<th> Id</th>
		            					<th>Author</th>
		            					<th>Comment</th>
		            					
		            					<!-- <th>Size</th> -->
		            				</tr>
		            			</thead>


		            			<tbody>
		            				<?php $comments = Comment::find_all(); 
		            				foreach($comments as $comment) : ?>
		            				
		            				<tr>
		            					<td><?php echo $comment->id; ?></td>
		            					<td>
		            						<?php echo $comment->author; ?>
		            						<div><a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a></div>
		            					</td>
		            					<td><?php echo $comment->body; ?></td>
		            					
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
