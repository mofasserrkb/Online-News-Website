  <?php                                
 require_once 'vendor/autoload.php';
$cat=new App\classes\Category();
$post=new App\classes\Post();
$category=$cat->allActiveCategory();
$getId=$_GET['id'];
$singlePost=$post->singlePost($getId);
$post=mysqli_fetch_assoc($singlePost);

  ?>

<?php require_once 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    
                        <div class="post-content single-post">
                            <h3><?php echo $post['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $post['category']; ?>'><?php echo $post['category_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $post['author']; ?>'><?php echo $post['username']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $post['post_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="uploads/<?php echo $post['post_img']; ?>" alt=""/>
                            <p class="description">
                                <?php echo $post['description']; ?>
                            </p>
                        </div>
                     
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
