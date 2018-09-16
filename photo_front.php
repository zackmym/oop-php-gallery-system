<?php require_once('includes/header.php'); ?>

<?php 
require_once("admin/includes/init.php");

    if(empty($_GET['id'])) {
        redirect_to('index.php');
    }

    $photo = photo::find_by_id($_GET['id']);
   
    //$comment = new Comment();
    if(isset($_POST['submit'])) {

        $author = trim($_POST['author']);
        $body= trim($_POST['body']);

        $new_comment = Comment::create_comment($photo->id, $author, $body);

        if($new_comment && $new_comment->save()) {
            redirect_to("photo_front.php?id=$photo->id");
        } else {
            $message = "comment not uploaded";
        }
        // $comment->author = trim($_POST['author']);
        // $comment->body = trim($_POST['body']);
        // $comment->photo_id = $photo->id;

        // $comment->save();
        


        
        
    } else {
        $author = "";
        $body = "";
    }

    $found_comments = Comment::find_comments($photo->id);


?>


             <?php require_once('includes/navigation.php'); ?>

    <!-- Page Content -->
             <div class="container">

             <div class="row">
    

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
                
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Kack</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"> <?php echo $photo->caption; ?></p>
                <p> <?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
               
                    
                
    

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php 
                    foreach($found_comments as $comments): ?>


                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comments->author ?>
                            
                        </h4>
                        <?php echo $comments->body; ?>
                    </div>
                </div>

                <?php endforeach; ?>



  

            </div>

            
            <!-- Blog Sidebar Widgets Column -->
            <?php //require_once('includes/sidebar.php'); ?>
        </div>
        <!-- /.row -->

        <hr>

        <?php require_once('includes/footer.php'); ?>
