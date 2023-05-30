<?php
 include'header2.php';


?>
 <div class="container mt-5 p-5 border-0 rounded w-50 "style="background-color: #e3f2fd">
<h3 class="pb-4">Admin</h3>
    <form action="<?php $_SERVER['PHP_SELF'];  ?>"method="POST">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5"> username</label>
    <input type="text"name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5"> password </label>
    <input type="password"name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  
  <button type="submit"name="login"value="login" class="btn btn-primary fw-bold fs-5">login</button>
</form>
<?php
if(isset($_POST['login'])){
  $conn=mysqli_connect("localhost","root","","project") or die("conn failed");

 $username=mysqli_real_escape_string($conn,$_POST['username']);
  
 $password=$_POST['password'];
 $sql="SELECT user_id,username,role FROM user WHERE username='{$username}'AND password='{$password}'";

 $result=mysqli_query($conn,$sql) or die("unsussesfull");
 if(mysqli_num_rows($result)>0){
  echo "goo";
  while($row=mysqli_fetch_assoc($result)) {
session_start();

  $_SESSION['username']=$row['username'];
  $_SESSION['user_id']=$row['user_id'];
  $_SESSION['user_role']=$row['role'];
   header("location: http://localhost/hetal/project/post.php");
    }
  
}else{
  echo "not run";

}
}
?>
</div>
</body>
</html>