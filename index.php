<?php require_once('includes/header.php'); ?>

    <!-- Navigation -->
   <?php require_once('includes/navigation.php'); ?>

   <?php 
        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1 ;
        $items_per_page = 4;
        $items_total_count = Photo::count_all();

        $paginate = new Pagination($page, $items_per_page, $items_total_count);

        $sql = "SELECT * FROM photos ";
        $sql .= "LIMIT {$items_per_page} ";
        $sql .= "OFFSET {$paginate->offset()}";

        $photos = Photo::find_by_query($sql);


    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div class="thumbnail row">
                <?php  
               //$photos = Photo::find_all();
               foreach($photos as $photo) : ?>

                
                    <div class="col-xs-6 col-md-3">
                        
                        <a class="thumbnail" href="photo_front.php?id=<?php echo $photo->id; ?>">
                            <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                        </a>




                    </div>
                


               <?php endforeach; ?>

               </div>

               <div class="row">


                   <div class="pager">
                       <ul>
                            <?php 
                                if($paginate->page_total() > 1) {
                                    if($paginate->has_next()) {
                                       echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                                    } 



                                    for($i=1; $i<=$paginate->page_total(); $i++) {
                                        if($i == $paginate->current_page) {
                                            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                        } else {
                                            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                        }
                                    } 




                                    if($paginate->has_previous()) {
                                        echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                                    }
                                }
                             ?>
                           
                          
                       </ul>
                   </div>

               </div>
            

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php //require_once('includes/sidebar.php'); ?>
        </div>
        <!-- /.row -->

        <hr>

        <?php require_once('includes/footer.php'); ?>

