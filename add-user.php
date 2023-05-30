<?php
include'header2.php';
if(isset($_POST['save'])){
  $conn=mysqli_connect("localhost","root","","project") or die("conn failed");
  
  $fname=mysqli_real_escape_string($conn,$_POST['fname']);
  $lname=mysqli_real_escape_string($conn,$_POST['lname']);
  $user=mysqli_real_escape_string($conn,$_POST['user']);
  $password=mysqli_real_escape_string($conn,md5($_POST['password']));
  $role=mysqli_real_escape_string($conn,$_POST['role']);

$sql="SELECT username FROM user WHERE username='{$user}'";
$result=mysqli_query($conn,$sql)or die("unsussesfull");
if(mysqli_num_rows($result)>0){
  echo"username exsite";
}else{
  echo $sql1="INSERT INTO user(first_name,last_name,username,password,role)

 VALUES('{$fname}','{$lname}','{$user}','{$password}','{$role}')";

 if(mysqli_query($conn,$sql1)){
 header("Location : http://localhost/hetal/project/users.php");
 mysqli_close($conn);
 }
}

}
?>

    
    <div class="container mt-5 p-5 border-0 rounded w-50 "style="background-color: #e3f2fd">
<h3 class="pb-4">Add users</h3>
    <form action="<?php $_SERVER['PHP_SELF'];  ?>"method="post">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5"> First Name</label>
    <input type="text"name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5"> Last Name</label>
    <input type="text"name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5"> User Name</label>
    <input type="text"name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">Password</label>
    <input type="password"name="password"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">User Role</label>
    
    <select class="form-select form-select-lg mb-3"name="role" aria-label=".form-select-lg example">
    <option value="0">Normal User </option>
    <option value="1">Admin </option>
    </select>
  </div>
  <button type="submit"name="save" class="btn btn-primary fw-bold fs-5">Save</button>
</form>

</div>
</body>
</html>