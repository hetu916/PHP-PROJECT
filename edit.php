<?php
include'header.php';
?>
<div class="container mt-5 p-5 border-0 rounded w-50 "style="background-color: #e3f2fd">
<h3 class="pb-4">Update Records</h3>  
<?php
$conn=mysqli_connect("localhost","root","","crud");
 $stu_id = $_GET['id'];
$sql="SELECT * FROM student WHERE sid={$stu_id}";
$result=mysqli_query($conn,$sql) or die("unsussesfull");
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)) {

?>
<form action="updatedata.php"method="post">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5">Name</label>
    <input type="hidden"name="sid"value="<?php echo $row['sid'];  ?>">
    <input type="text"name="sname"value="<?php echo $row['sname'];  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">Address</label>
    <input type="text"name="saddress"value="<?php echo $row['saddress'];  ?>"class="form-control" id="exampleInputPassword1">
  </div>
  <label for="exampleInputselect form-label" class="fw-bold fs-5">Select Class</label>
  <div class="form-group mb-3">
  
   <?php
$sql1="SELECT* FROM studentclass"; 
$result1=mysqli_query($conn,$sql1)or die("unsussesfull");
if(mysqli_num_rows($result1)>0){
    echo '<select name="sclass">';

    while($row1=mysqli_fetch_assoc($result1)) {
if($row['sclass']==$row1['cid']){
$select="selected";
}else{
$select="";
}

  echo "<option {$select} value='{$row1['cid']}'>{$row1['cname']} </option>";
    }
echo "</select>";
}
?>
    </div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">Phone</label>
    <input type="text"name="sphone"value="<?php echo $row['sphone'];  ?>"class="form-control" id="exampleInputPassword1">
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