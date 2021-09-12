<?php   require_once 'vendor/autoload.php'; 
$cat=new App\classes\Category();

$category=$cat->allMenuCategory();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/world-news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                if(isset($_GET['cid'])){
                  $cat_id = $_GET['cid'];
                }
                if(mysqli_num_rows($category) > 0){
                  $active = "";
                ?>
                <ul class='menu'>
                    <li><a href="index.php">Home </a></li>

                    <?php 
                          while($row = mysqli_fetch_assoc($category)) {
                    if(isset($_GET['cid'])){
                      if($row['category_id'] == $cat_id){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                    }
                    echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                  } 
                /* while($row=mysqli_fetch_assoc($category))
                                { ?>  
        <li><a href='category.php?cid=<?= $row['category_id'] ?>'><?= $row['category_name']  ?> </a></li>
                    <?php } 

                    */?>
                </ul>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
