    <?php require_once('includes/admin_header.php') ?>
    <?php 
        if(!$session->is_logged_in()) {redirect_to("../admin/login.php");}
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

           <?php include('includes/admin_content.php'); ?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
