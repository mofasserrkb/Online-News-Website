<?php include "header.php"; ?>
  <?php 
        require_once '../vendor/autoload.php';
       
        $post= new App\classes\Post();
        $category= new App\classes\Category();
        $allActiveCategory=$category->allActiveCategory();
        if(isset($_POST['submit'])) {
       $msg=  $post->updatePost($_POST);
     
        }
   
        $id=$_GET['id'];
        $result= $post->selectRow($id);
        $row=mysqli_fetch_assoc($result);
      
            
  ?>

<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
          <h1><?= isset($msg)? $msg:''   ?> </h1>
        <!-- Form for show edit-->
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                 <?php echo $row['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
            <?php while ($row1=mysqli_fetch_assoc($allActiveCategory)) {
               ?>  
          <option <?=$row1['category_id']==$row['category']?'selected':'' ?> value="<?= $row1['category_id']?>"><?= $row1['category_name']?> </option>
              <?php } ?>                   
                </select>
                <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
              <img style="height:150px;" src="../uploads/<?= $row['post_img']?>">
              
            
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
