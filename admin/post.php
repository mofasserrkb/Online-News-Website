<?php include "header.php"; ?>
  <?php 
        require_once '../vendor/autoload.php';
       
        $post= new App\classes\Post();
      
    $limit = 2;
    $total_page=$post->totalPages($limit);
    
        if(isset($_GET['page'])){
          $page = $_GET['page'];
            }else{
            $page = 1;
            }
        $offSET = ($page - 1) * $limit;
  $allpost=$post->allPost($offSET,$limit);
  ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                <?php      
                      if(mysqli_num_rows($allpost)>0)
                 {
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <tr>
                             <?php  
                         $serial=1;
                         while($row = mysqli_fetch_assoc($allpost)) {
                      
                      ?>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><?php echo $row['post_date']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete.php?id=<?php echo $row['post_id']; ?>&catid=<?php echo $row['category']; ?>&post_img=<?php echo $row['post_img'] ;?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                           <?php
                          $serial++;
                        } ?>
                     
                      </tbody>
                  </table>
                       <?php  } ?>
                <?php

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="post.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="post.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                


              ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
