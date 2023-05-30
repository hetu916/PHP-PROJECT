<?php
include'header.php';
?>
<div class="container mt-5 p-5 border-0 rounded w-50 "style="background-color: #e3f2fd">
<h3 class="pb-4">Add New Records</h3>
<form action="savedata.php"method="post">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5">Name</label>
    <input type="text"name="sname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">Address</label>
    <input type="text"name="saddress"class="form-control" id="exampleInputPassword1">
  </div>
  <p class="fw-bold fs-5">Select Class</p>
  <select class="form-select form-select-lg mb-3"name="class" aria-label=".form-select-lg example">
   
  <option selected>Select Class</option>
  
  <?php
$conn=mysqli_connect("localhost","root","","crud") or die("conn failed");
$sql="SELECT* FROM studentclass ";
$result=mysqli_query($conn,$sql)or die("unsussesfull");
while($row=mysqli_fetch_assoc($result)) {
    
  ?>
  <option value="<?php echo $row['cid'];  ?>"><?php echo $row['cname'];  ?></option>
<?php
}
?>

</select>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">Phone</label>
    <input type="text"name="sphone"class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary fw-bold fs-5">Submit</button>
</form>

</div>
</body>
</html>