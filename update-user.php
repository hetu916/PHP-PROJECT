<?php
include'header2.php';

?>

<div class="container mt-5 p-5 border-0 rounded w-50 "style="background-color: #e3f2fd">
<h3 class="pb-4">Update user</h3>

<?php
$conn=mysqli_connect("localhost","root","","project");
 $stu_id = $_GET['id'];
$sql="SELECT * FROM user WHERE user_id={$stu_id}";
$result=mysqli_query($conn,$sql) or die("unsussesfull");
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)) {


?> 

<!-- <div class="container mt-5 p-5 border-0 rounded w-50 "style="background-color: #e3f2fd">
<h3 class="pb-4">Update Records</h3> -->

<form action="user-data.php"method="post">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5">First Name</label>
    <input type="hidden"name="user_id"value="<?php echo $row['user_id'];  ?>">
    <input type="text"name="f_name"value="<?php echo $row['first_name'];  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5">Last Name</label>
    
    <input type="text"name="l_name"value="<?php echo $row['last_name'];  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">Username</label>
    <input type="text"name="username"value="<?php echo $row['username'];  ?>"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">User Role</label>
    
    <select class="form-select form-select-lg mb-3"name="role"value="<?php echo $row['role'];?>" aria-label=".form-select-lg example">
    <?php if($row['role']==1){
        echo" <option value='0'>Normal User </option>
        <option value='1'selected>Admin </option>";
     }else{
      echo" <option value='0'selected>Normal User </option>
      <option value='1'>Admin </option>";
     }


    ?>
    
    
    </select>
  </div>

  <button type="submit"value="update" class="btn btn-primary fw-bold fs-5">Update</button>
</form>
<?php
}
}


?>
</div>
</body>
</html>