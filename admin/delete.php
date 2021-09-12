<?php 
        require_once '../vendor/autoload.php';
       
        $category= new App\classes\Category();
         $post= new App\classes\Post();
        $user= new App\classes\User();
    if(isset($_GET['user']))
    {   
      
        $id=$_GET['id'];
          $user->delete($id);
        header("Location:../admin/users.php");
      
    }
    /*Delete post */
      if(isset($_GET['catid']))
    {   


  $post_id = $_GET['id'];
  $cat_id = $_GET['catid'];

     $filename=$_GET['post_img'];

     unlink('../uploads/'.$filename);
      
        $post->delete($post_id,$cat_id);
        header("Location:post.php");
      
    }

    if(isset($_GET['category']))
    {   
      
        $id=$_GET['id'];
          $category->delete($id);
        header('Location:category.php');
      
    }

?>