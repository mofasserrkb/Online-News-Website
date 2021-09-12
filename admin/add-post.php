<?php require_once "header.php"; ?>
  <?php 
        require_once '../vendor/autoload.php';
       
        $post= new App\classes\Post();
        $category= new App\classes\Category();
      $allActiveCategory=$category->allActiveCategory();
      
        if(isset($_POST['submit'])) {
        $msg=  $post->addPost($_POST);
        }
    
  ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <h1><?= isset($msg)? $msg:''   ?> </h1>
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                            <option value="" > Select Category</option>
                           <?php while ($row=mysqli_fetch_assoc($allActiveCategory)) {
                              ?> 
                                 <option value="<?= $row['category_id']?>"><?= $row['category_name']?> </option>
                                <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php require_once "footer.php"; ?>
