<?php

namespace App\classes;
use App\classes\Database;
class User
{
 
  public function addUser($data)
   {
       
  $fname =mysqli_real_escape_string(Database::dbcon(),$data['fname']);
  $lname = mysqli_real_escape_string(Database::dbcon(),$data['lname']);
  $user = mysqli_real_escape_string(Database::dbcon(),$data['user']);
  $password = mysqli_real_escape_string(Database::dbcon(),md5($data['password']));
  $role = mysqli_real_escape_string(Database::dbcon(),$data['role']);

$sql = "SELECT username FROM user WHERE username = '{$user}'";

  $result = mysqli_query(Database::dbcon(), $sql) or die("Query Failed.");

  if(mysqli_num_rows($result) > 0){
    $insertMsg="UserName already Exists";
        return $insertMsg; 
  }
  else{
    $sql1 = "INSERT INTO user (first_name,last_name, username, password, role)
              VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$role}')";
    if(mysqli_query(Database::dbcon(),$sql1)){
     // header("Location: admin/add-user.php");
         $insertMsg= " User Saved successfully";
      return $insertMsg; 
    }else{
      $insertMsg= "Can't Save User";
      return $insertMsg; 
    }
  }
}

   public function allUser($offset,$limit) {
$sql1= "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";
    $result  = mysqli_query(Database::dbcon(),$sql1);
    return $result;
    }
  public function selectRow($id='') {
        $sql5= "SELECT * FROM user WHERE user_id='$id'";
    $result  = mysqli_query(Database::dbcon(),$sql5);
    return $result;
    }
 public function updateUser($data) {

  $userid =mysqli_real_escape_string(Database::dbcon(),$data['user_id']);
  $fname =mysqli_real_escape_string(Database::dbcon(),$data['fname']);
  $lname = mysqli_real_escape_string(Database::dbcon(),$data['lname']);
  $user = mysqli_real_escape_string(Database::dbcon(),$data['username']);
  $password = mysqli_real_escape_string(Database::dbcon(),md5($data['password']));
  $role = mysqli_real_escape_string(Database::dbcon(),$data['role']);

  $sql = "UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', role = '{$role}' WHERE user_id = {$userid}";

    if(mysqli_query(Database::dbcon(),$sql)){
      header("Location:../admin/users.php");
    }
    else {
        $msg="can't modify user info ";
    }
    return $msg;

  }
    public function delete($id) {
     $sql4="DELETE FROM user  WHERE user_id='$id'";
     $result  = mysqli_query(Database::dbcon(),$sql4);
    }
    public function totalPages($limit) {
    $sql1= "SELECT * FROM user ";
    $result  = mysqli_query(Database::dbcon(),$sql1);
    if(mysqli_num_rows($result)>0)
    {
      $totalRecords= mysqli_num_rows($result);
     
      $totalPages= ceil($totalRecords/$limit);
    }
    return $totalPages;
    }
       public function allActivePost($offset,$limit) {
               
    $sql1= "SELECT * FROM blog WHERE status='1' ORDER BY id DESC  LIMIT {$offset},{$limit}  ";
    $result  = mysqli_query(Database::dbcon(),$sql1);

    return $result;
    }


}
?>