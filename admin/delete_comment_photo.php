    <?php require_once('includes/init.php') ?>
    <?php 
        if(!$session->is_logged_in()) {redirect_to("../admin/login.php");}
    ?>

   <?php
        if(empty($_GET['id'])) {
            redirect_to('comments.php'); 
        }

        $comment = Comment::find_by_id($_GET['id']);

        if($comment) {
            $comment->delete();
            
            redirect_to("comment_photo.php?id=$comment->photo_id");
        } else {
            redirect_to("comment_photo.php?id=$comment->photo_id"); 
        }

    ?>
