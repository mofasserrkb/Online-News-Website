  <?php                                
 require_once 'vendor/autoload.php';
$cat=new App\classes\Category();
$post=new App\classes\Post();
use App\classes\Database;


  ?>
  <?php require_once 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
   <?php
                
       if(isset($_GET['search']))
     {
          $search=$_GET['search'];
           $limit = 2;
        if(isset($_GET['page'])){
          $page = $_GET['page'];
            }else{
            $page = 1;
            }
        $offSET = ($page - 1) * $limit;
         $totalPage=$post->searchPage($search);
            $search1=$post->searchPost($search,$offSET);
     
             
                ?>


                  <h2 class="page-heading">Search : <?php echo $search; ?></h2>
                  <?php

              if(mysqli_num_rows($search1)>0)
               {
            while($row3=mysqli_fetch_assoc($search1))       
      
                  {
                  ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                              <a class="post-img" href="single.php?id=<?php echo $row3['post_id']; ?>"><img src="uploads/<?php echo $row3['post_img']; ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                              <div class="inner-content clearfix">
                                  <h3><a href='single.php?id=<?php echo $row3['post_id']; ?>'><?php echo $row3['title']; ?></a></h3>
                                  <div class="post-information">
                                      <span>
                                          <i class="fa fa-tags" aria-hidden="true"></i>
                                          <a href='category.php?cid=<?php echo $row3['category']; ?>'><?php echo $row3['category_name']; ?></a>
                                      </span>
                                      <span>
                                          <i class="fa fa-user" aria-hidden="true"></i>
                                          <a href='author.php?aid=<?php echo $row3['author']; ?>'><?php echo $row3['username']; ?></a>
                                      </span>
                                      <span>
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                          <?php echo $row3['post_date']; ?>
                                      </span>
                                  </div>
                                  <p class="description">
                                      <?php echo substr($row3['description'],0,130) . "..."; ?>
                                  </p>
                                  <a class='read-more pull-right' href='single.php?id=<?php echo $row3['post_id']; ?>'>read more</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <?php
                      }
                    }else{
                      echo "<h2>No Record Found.</h2>";
                    }

                   if($totalPage>0)
                {

                      echo '<ul class="pagination admin-pagination">';
                      if($page > 1){
                        echo '<li><a href="search.php?search='.$search.'&page='.($page - 1).'">Prev</a></li>';
                      }
                      for($i = 1; $i <= $totalPage; $i++){
                        if($i == $page){
                          $active = "active";
                        }else{
                          $active = "";
                        }
                        echo '<li class="'.$active.'"><a href="search.php?search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                      }
                      if($totalPage > $page){
                        echo '<li><a href="search.php?search='.$search.'&page='.($page + 1).'">Next</a></li>';
                      }

                      echo '</ul>';
                    }
                  }
                  
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php require_once 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php require_once 'footer.php'; ?>
