<?php

namespace App\classes;
use App\classes\Database;
class Category {


  public function allCategory($offset,$limit) {
$sql1= "SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset},{$limit}";
    $result  = mysqli_query(Database::dbcon(),$sql1);
    return $result;
    }



public function totalPages($limit) {
    $sql1= "SELECT * FROM category ";
    $result  = mysqli_query(Database::dbcon(),$sql1);
    if(mysqli_num_rows($result)>0)
    {
      $totalRecords= mysqli_num_rows($result);
     
      $totalPages= ceil($totalRecords/$limit);
    }
    return $totalPages;
    }
    

    public function addCategory($data) {
    
    $category =mysqli_real_escape_string(Database::dbcon(), $data['cat']);
      $sql = "SELECT category_name FROM category where category_name='{$category}'";
    $result = mysqli_query(Database::dbcon(), $sql);
        if (mysqli_num_rows($result)> 0) {
      $insertMsg="Category already exists";
        return $insertMsg;
            
      }
      else{
            
            $sql = "INSERT INTO category (category_name)
                    VALUES ('{$category}')";

            if (mysqli_query(Database::dbcon(), $sql)){
                header("location:category.php");
            }else{
              $insertMsg="Category already exists";
           return $insertMsg;
                  }

         }
         }
       public function selectRow($id='') {
        $sql5= "SELECT * FROM category WHERE category_id='$id'";
    $result  = mysqli_query(Database::dbcon(),$sql5);
    return $result;
    }

   public function updateCategory($data) {
   
   $categoryID=$data['cat_id'];
  $categoryName=$data['cat_name'];
   $sql1 = "UPDATE category SET category_id=' $categoryID', category_name='$categoryName'  WHERE 
    category_id=$categoryID";

    if (mysqli_query(Database::dbcon(),$sql1)){
    
      header("location:category.php");
    }
    else {
           $Msg= "Upadated is not done";
           return $Msg;

         } 

    }

    public function allActiveCategory() {
        $sql1= "SELECT * FROM category ";
    $result  = mysqli_query(Database::dbcon(),$sql1);
    return $result;
    }
      public function allMenuCategory() {
        $sql1= "SELECT * FROM category WHERE post > 0 ";
    $result  = mysqli_query(Database::dbcon(),$sql1);
    return $result;
    }
    public function delete($id) {
     $sql4="DELETE FROM category  WHERE category_id='$id'";
     $result  = mysqli_query(Database::dbcon(),$sql4);
    }

    public function catName($cat_id) {
    $sql1= "SELECT * FROM category WHERE category_id = {$cat_id}";
    $result  = mysqli_query(Database::dbcon(),$sql1);

    return $result;
    }
  
     }




?>