<?php

// echo "<h3>". basename($_SERVER['PHP_SELF']) ."<h3>";
$conn = mysqli_connect("localhost", "root", "", "project") or die("not run");
$page= basename($_SERVER['PHP_SELF']);
switch($page){
case "single.php";
if(isset($_GET['id'])){
 $sql_title="SELECT * FROM post WHERE post_id={$_GET['id']}";
 $result_title=mysqli_query ($conn,$sql_title);
 $row_title=mysqli_fetch_assoc($result_title);
 $page_title=$row_title['title']  ."news";

}else{
    $page_title="not found";
}

break;
case "category.php";
if(isset($_GET['cid'])){
    $sql_title="SELECT * FROM category WHERE category_id={$_GET['cid']}";
    $result_title=mysqli_query ($conn,$sql_title);
    $row_title=mysqli_fetch_assoc($result_title);
    $page_title=$row_title['category_name'] ."news";
   
   }else{
       $page_title="not found";
   }
break;
case "search.php";
if(isset($_GET['search'])){
    
    $page_title=$_GET['search'];
   }else{
       $page_title="not found";
   }
break;
default :
$page_title="home page";
break;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title><?php echo $page_title;  ?></title>
</head>

<body>

    <div class="navbar navbar-dark bg-primary justify-content-between secondary ps-4  ">
        <div class="py-1"><a href="index2.php"><img src="images/news.jpg" style="width:150px ; height:50px"></a></div>
        <a href="logout.php" class="btn btn-primary me-4 fw-bold" type="button"> LOGOUT</a>
    </div>

    <nav class="navbar navbar-light " style="background-color: #e3f2fd;">
        <?php
 $conn = mysqli_connect("localhost", "root", "", "project") or die("not run");
if(isset($_GET['cid'])){
$cat_id=$_GET['cid'];
}


 

$sql="SELECT * FROM category WHERE post >0";
$result=mysqli_query($conn,$sql)or die("unsussesfull");

  if(mysqli_num_rows($result)>0){
    $achive="";
?>

        <div class="d-grid gap-2 d-md-block">
            <ul class="list-unstyled d-flex">
                <!-- <li><a href=' echo header("Location: http://localhost/hetal/project/.php"); ?>'>HOME</a>  -->
                </li>
                <?php
 while ($row=mysqli_fetch_assoc($result)) {
    if(isset($_GET['cid'])) {
        if($row['category_id']==$cat_id){
            $achive="active";
        }else{
            $achive="";
        }
    }
    
  ?>
                <li><a class='{$achive} fw-bold fs-4 ps-2 ' href="category.php?cid=<?php echo $row['category_id'];?>"
                        type="button" class="fw-bold fs-4 ps-2 list-unstyled"><?php echo $row['category_name'];?></a>
                </li>
                <?php
 }
  ?>
            </ul>
        </div>
        <?php
 }
  ?>

    </nav>