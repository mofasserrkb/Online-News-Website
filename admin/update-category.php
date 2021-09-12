<?php include "header.php"; ?>
<?php 
if($_SESSION["user_role"] == '0'){
  header("Location: post.php");
}
?>
  <?php 
        require_once '../vendor/autoload.php';
       
        $category= new App\classes\Category();
             

      
        $id=$_GET['id'];
        $result= $category->selectRow($id);

        $row=mysqli_fetch_assoc($result);
        
        if(isset($_POST['submit'])) {
        $msg=  $category->updateCategory($_POST);
        }       
  ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">

      <?php 
       if (isset($msg)) {
      ?>
       <h5 class="text-center"><?= $msg ?></h5>
      <?php 
       }
      ?>
                  <form action="" method ="POST">
                      
                      <div class="form-group">
                      <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>">
                      </div>

                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
