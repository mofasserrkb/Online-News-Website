<?php 
namespace App\classes;
use App\classes\Database;
class Login {
 
 public function loginCheck($data) {


                      if(empty($data['username']) || empty($data['password'])){
                        $loginError="All Fields must be entered!";
                            return $loginError;
                              die();
                            }
   else
        { 
  $username = mysqli_real_escape_string(Database::dbcon(),$data['username']);
                              $password = md5($data['password']);

                              $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password= '{$password}'";

                            $result = mysqli_query(Database::dbcon(), $sql) ;

                              if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                  session_start();
                                  $_SESSION["username"] = $row['username'];
                                  $_SESSION["user_id"] = $row['user_id'];
                                  $_SESSION["user_role"] = $row['role'];
                                 
                              header('Location:users.php');
                                }
                              }
              else {
      $loginError="username or password invalid!";
      return $loginError;
                }
             }
 
 } 
}

?>