<?php 
namespace App\classes;
class Database {
 
 public function dbcon() {
    $host="localhost";
 	$user="root";
    $pass="";
    $db="newsonline";
   $link= mysqli_connect($host,$user,$pass,$db);
   return $link;
 } 
}

?>