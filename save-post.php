<?php
$conn=mysqli_connect("localhost","root","","project") or die("conn failed");
if(isset($_FILES['filetoupload'])){
    $errors=array();
 $file_name=$_FILES['filetoupload']['name'];

 $file_size=$_FILES['filetoupload']['size'];

 $file_tmp=$_FILES['filetoupload']['tmp_name'];

 $file_type=$_FILES['filetoupload']['type'];


  $file_ext=end(explode('.',$file_name));

 $extensions=array("jpeg","png","jpg");

if(in_array($file_ext,$extensions)===false)

{
    $errors[]="this file is not aalows";
}
if($file_size>2097152){
    $errors[]="this file is not aalows"; 
}

  }
 if(empty($errors)==true){
     move_uploaded_file($file_name,"<admin>upload/".$file_name);
 }else{
     print_r( $errors);
     die();
 }
   

session_start();
  $title=mysqli_real_escape_string($conn,$_POST['post_title']);

  $description=mysqli_real_escape_string($conn,$_POST['postdesc']);
  $category=mysqli_real_escape_string($conn,$_POST['category']);
  $date=date("d M Y");
$author=$_SESSION['user_id'];
 $sql="INSERT INTO post(title,description,category,post_date,author,post_img)
VALUES('{$title}','{$description}','{$category}','{$date}','{$author}','{$file_name}');";

 $sql.="UPDATE category SET post=post+1 WHERE category_id='{$category}'";

if(mysqli_multi_query($conn,$sql)){

    header("Location: http://localhost/hetal/project/post.php");
}else{
    echo"failed";
}
?>


