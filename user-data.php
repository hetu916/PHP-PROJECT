<?php

    $conn=mysqli_connect("localhost","root","","project") or die("conn failed");
   
    $user_id=$_POST['user_id'];
    
    $fname=$_POST['f_name'];
    
    $lname=$_POST['l_name'];
    
    $user=$_POST['username'];
    
    // $password=mysqli_real_escape_string($conn,md5($_POST['password']));
    $role=$_POST['role'];
    
  
  $sql=" UPDATE user SET first_name='{$fname}', last_name='{$lname}', username='{$user}', role='{$role}' WHERE user_id=user_id ";

  $result=mysqli_query($conn,$sql) ;
 
   header("Location: http://localhost/hetal/project/users.php");
   mysqli_close($conn);

  
?>