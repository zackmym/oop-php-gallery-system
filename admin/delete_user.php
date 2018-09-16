    <?php require_once('includes/init.php') ?>
    <?php 
        if(!$session->is_logged_in()) {redirect_to("../admin/login.php");}
    ?>

   <?php
        if(empty($_GET['id'])) {
            redirect_to('users.php'); 
        }

        $user = User::find_by_id($_GET['id']);

        if($user) {
            $user->delete();
            redirect_to('users.php');
        } else {
            redirect_to('users.php');
        }

    ?>
