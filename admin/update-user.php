  <?php 
         require_once'header.php';
  ?>
<?php 
if($_SESSION["user_role"] == '0'){
  header("Location: post.php");
}
?>

  <?php 
        require_once '../vendor/autoload.php';
       
        $user= new App\classes\User();
             
        if(isset($_POST['submit'])) {
        $msg=  $user->updateUser($_POST);
        }

        $id=$_GET['id'];
        $result= $user->selectRow($id);

        $row=mysqli_fetch_assoc($result);
          
        
    
  ?>



  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->

      <?php 
       if (isset($msg)) {
      ?>
       <h5 class="text-center"><?= $msg ?></h5>
      <?php 
       }
      ?>
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'];  ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'];  ?>" placeholder="" required>
                      </div>
                       <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                              if($row['role'] == 1){
                                echo "<option value='0'>normal User</option>
                                      <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>normal User</option>
                                      <option value='1'>Admin</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
