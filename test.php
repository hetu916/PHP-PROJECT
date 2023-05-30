<?php
 $conn=mysqli_connect("localhost","root","","project") or die("conn failed");
 
 $username=mysqli_real_escape_string($conn,$_POST['username']);
 
 $password=md5($_POST['password']);
 $sql="SELECT user_id,username,role FROM user WHERE username='{$username}'AND password='{$password}'";

  $result=mysqli_query($conn,$sql)or die("unsussesfull");

 if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
     
   $_SESSION["username"] = $row['username'];
   $_SESSION["user_id"] = $row['user_id'];
  $_SESSION["user_role"] = $row['role'];
  header("Location: http://localhost/hetal/project/post.php");
  
    }
    }

?>
<?php
if(isset($_POST['login'])){
    $conn=mysqli_connect("localhost","root","","project") or die("conn failed");
 
   $username=mysqli_real_escape_string($conn,$_POST['username']);
   
  echo $password=md5($_POST['password']);
  echo $sql="SELECT user_id,username,role FROM user WHERE username='{$username}'AND password='{$password}'";

echo  $result=mysqli_query($conn,$sql)or die("unsussesfull");

 if(mysqli_num_rows($result) > 0){
  while($row=mysqli_fetch_assoc($result)){
   
    echo $_SESSION["username"] = $row['username'];
    echo $_SESSION["user_id"] = $row['user_id'];
    echo $_SESSION["user_role"] = $row['role'];
    echo header("Location: http://localhost/hetal/project/post.php");


  }
}
}
?>