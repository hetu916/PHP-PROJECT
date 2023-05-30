<?php
$conn=mysqli_connect("localhost","root","","project") or die("conn failed");
if(empty($_FILES['new-image']['name'])){
    echo $file_name=$_POST['old-img'];

}else{
    $errors=array();
 $file_name=$_FILES['fileToupload']['name'];

 $file_size=$_FILES['fileToupload']['size'];

 $file_tmp=$_FILES['fileToupload']['tmp_name'];

 $file_type=$_FILES['fileToupload']['type'];


  $file_ext=end(explode('.',$file_name));

 $extensions=array("jpeg","png","jpg");

if(in_array($file_ext,$extensions)===false)

{
    $errors[]="this file is not aalows";
}
if($file_size>2097152){
    $errors[]="this file is not aalows"; 
}
if(empty($errors)==true){
    move_uploaded_file($file_name,"upload/".$file_name);
}else{
    print_r($errors);

}
}
$sql="UPDATE post SET title='{$_POST['title']}',description='{$_POST['postdesc']}',category='{$_POST['category']}',
post_img='{$file_name}'
WHERE post_id={$_POST['post_id']} ";
if($_POST['old_category']!=$_POST['category']){
    $sql .= "UPDATE category SET post=post - 1 WHERE category_id={$_POST['old_category']};";
    $sql .= "UPDATE category SET post=post + 1 WHERE category_id={$_POST['category']};";

}

$result=mysqli_multi_query($conn,$sql)or die("unsussesfull");
if($result){
    header("Location: http://localhost/hetal/project/post.php");
}else{
    echo"run failed";
}
?>
