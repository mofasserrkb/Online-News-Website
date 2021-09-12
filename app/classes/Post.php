<?php

namespace App\classes;
use App\classes\Database;
class Post
{
   public function addPost($data)
   {
     
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext=explode('.', $file_name);
    $file_ext = end($file_ext);
    $file_name=date('Ymdhis.').$file_ext;

 
  $title = mysqli_real_escape_string(Database::dbcon(), $data['post_title']);
  $description = mysqli_real_escape_string(Database::dbcon(), $data['postdesc']);
  $category = mysqli_real_escape_string(Database::dbcon(), $data['category']);
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];
$sql = "INSERT INTO post(title, description,category,post_date,author,post_img)
          VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$file_name}');";
  $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";
    if(mysqli_multi_query(Database::dbcon(), $sql)){
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],'../uploads/'.$file_name);
        $insertMsg="Post saved successfully";
        return $insertMsg;
  //  header("location: post.php");
  }else{
     $insertMsg="Post is not saved";
        return $insertMsg;
     }
  }

    public function totalPages($limit) {
        $sql = "SELECT post.post_id, post.title, post.description,post.post_date,
                    category.category_name,user.username,post.category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id";
    $result  = mysqli_query(Database::dbcon(),$sql);
    if(mysqli_num_rows($result)>0)
    {
      $totalRecords= mysqli_num_rows($result);
     
      $totalPages= ceil($totalRecords/$limit);
    }
    return $totalPages;
    }


  public function allPost($offset,$limit) {
$sql = "SELECT post.post_id, post.title, post.description,post.post_date,category.category_name,user.username,post.category,post.post_img FROM post LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
   ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
    $result  = mysqli_query(Database::dbcon(),$sql);
    return $result;
    }

      public function singlePost($id) {
$sql = "SELECT post.post_id, post.title, post.description,post.post_date,category.category_name,user.username,post.category,post.post_img FROM post LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
     WHERE post_id= '$id' ";
    $result  = mysqli_query(Database::dbcon(),$sql);
    return $result;
    }

     public function selectRow($post_id='') {
        $sql = "SELECT post.post_id, post.title, post.description,post.post_img,
        category.category_name, post.category FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN user ON post.author = user.user_id
        WHERE post.post_id = {$post_id}";

    $result  = mysqli_query(Database::dbcon(),$sql);
    return $result;
    }
  
    public function updatePost($data) {
  $title = mysqli_real_escape_string(Database::dbcon(), $data['post_title']);
  $description = mysqli_real_escape_string(Database::dbcon(), $data['postdesc']);
  $category = mysqli_real_escape_string(Database::dbcon(), $data['category']);
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];
   if($_FILES['new-image']['name']==Null) {
   $sql = "UPDATE post SET title='{$title}',description='{$description}',category={$category}
        WHERE post_id={$data['post_id']};";
  if($data['old_category'] != $category) {
  $sql .= "UPDATE category SET post= post - 1 WHERE category_id = 
  {$data['old_category']};";
  $sql .= "UPDATE category SET post= post + 1 WHERE category_id = 
  {$category};";
   } 
}
   else{
     
    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_ext=explode('.', $file_name);
    $file_ext = end($file_ext);
    $file_name=date('Ymdhis.').$file_ext;
  $sql = "UPDATE post SET title='{$title}',description='{$description}',category={$category},post_img='{$file_name}'
        WHERE post_id={$data['post_id']};";
if($data['old_category'] != $category) {
  $sql .= "UPDATE category SET post= post - 1 WHERE category_id = 
  {$data['old_category']};";
  $sql .= "UPDATE category SET post= post + 1 WHERE category_id = 
  {$category};";
   } 
 
    move_uploaded_file($_FILES['new-image']['tmp_name'],'../uploads/'.$file_name);

   }

    $result= mysqli_multi_query(Database::dbcon(),$sql);
    if($result)
    {
      
   $finalresult ="Updated successfully";  
        
            return    $finalresult;
       

    }
     else 
     {
         $finalresult ="Updated failed";  
        
            return    $finalresult;
     }

}

 public function delete($post_id,$cat_id) {

  $sql = "DELETE FROM post WHERE post_id = {$post_id};";
  $sql .= "UPDATE category SET post= post - 1 WHERE category_id = {$cat_id}";

     $result  = mysqli_multi_query(Database::dbcon(),$sql);
    }

        public function totalPage($cat_id) {
        $sql1= "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                    category.category_name,user.username,post.category,post.post_img FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.category = {$cat_id}";
    $result  = mysqli_query(Database::dbcon(),$sql1);
    if(mysqli_num_rows($result)>0)
    {
      $totalRecords= mysqli_num_rows($result);
      $limit=2;
      $total= ceil($totalRecords/$limit);
    }

    return $total;

    }
  
    public function catPost($cat_id,$offset,$limit) {

    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                    category.category_name,user.username,post.category,post.post_img FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.category = {$cat_id}
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit} ";
    $result  = mysqli_query(Database::dbcon(),$sql);

    return $result;

    
    }
     public function searchPost($text,$offset) {
     $limit=2;           
    $sql1="SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                    category.category_name,user.username,post.category,post.post_img FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.title LIKE '%{$text}%' OR post.description LIKE '%{$text}%'
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

    $result  = mysqli_query(Database::dbcon(),$sql1);

    return $result;
    }

    public function searchPage($text) {
$sql9= "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                    category.category_name,user.username,post.category,post.post_img FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.title LIKE '%{$text}%' OR post.description LIKE '%{$text}%'
                     ";
$result  = mysqli_query(Database::dbcon(),$sql9) or die(mysqli_error(Database::dbcon()));
  
    if(mysqli_num_rows($result)>0)
    {
      $totalRecords= mysqli_num_rows($result);
      $limit=2;
      $totalSearchPage= ceil($totalRecords/$limit);
    }
    else {
        $totalSearchPage=0;

    }
    return $totalSearchPage;
    }

public function allActiveRecentPost() {
     $limit=3;           
    $sql1= "SELECT post.post_id, post.title, post.post_date,
        category.category_name,post.category,post.post_img FROM post
        LEFT JOIN category ON post.category = category.category_id
        ORDER BY post.post_id DESC LIMIT {$limit}";

    $result  = mysqli_query(Database::dbcon(),$sql1);

    return $result;
    }  

}

 
?>