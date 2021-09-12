  <?php                                
 require_once 'vendor/autoload.php';
$cat=new App\classes\Category();
$post=new App\classes\Post();
$category=$cat->allActiveCategory();
$limit = 3;
$totalPage=$post->totalPages($limit);
        if(isset($_GET['page'])){
          $page = $_GET['page'];
            }else{
            $page = 1;
            }
        $offSET = ($page - 1) * $limit;
$post=$post->allPost($offSET,$limit);



  ?>



<?php require_once 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        
                              <?php
      if(mysqli_num_rows($post) > 0){
       while($row=mysqli_fetch_assoc($post))       
      
                {
                    ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="uploads/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'>
                                            <?php echo $row['title']; ?>
                                        </a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category']; ?>'>
                                     <?php echo $row['category_name']; ?>               

                                                </a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='#'><?php echo $row['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                              <?php echo $row['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                           <?php echo substr($row['description'],0,130) . "..."; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                        <?php 
                         echo '<ul class="pagination admin-pagination">';
                          if($page > 1){
                            echo '<li><a href="index.php?page='.($page - 1).'">Prev</a></li>';
                          }
                          for($i = 1; $i <= $totalPage; $i++){
                            if($i == $page){
                              $active = "active";
                            }else{
                              $active = "";
                            }
                            echo '<li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                          }
                          if($totalPage > $page){
                            echo '<li><a href="index.php?page='.($page + 1).'">Next</a></li>';
                          }

                          echo '</ul>';
                      
                        ?>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'; ?>
