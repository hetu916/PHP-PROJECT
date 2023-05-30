<?php
include'header2.php';


?>
<div class="container mt-5 p-5 border-0 rounded w-50 "style="background-color: #e3f2fd">
<h3 class="pb-4">Add new post</h3>
    <form action="save-post.php"method="POST" enctype="multipart/form-data">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label fw-bold fs-5"> Title</label>
    <input type="text"name="post_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label fw-bold fs-5">Description</label>
  <textarea class="form-control"name="postdesc" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold fs-5">Category</label>
    
    <select class="form-select form-select-lg mb-3"name="category" aria-label=".form-select-lg example">
    
    <?php
$conn=mysqli_connect("localhost","root","","project") or die("conn failed");
$sql="SELECT* FROM category";
$result=mysqli_query($conn,$sql)or die("unsussesfull");
if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_assoc($result)) {
echo"<option value='{$row['category_id']}'> {$row['category_name']}</option>";

    
}
}
    ?>
    <option value="1">Admin </option>
    </select>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label fw-bold fs-5">Post image</label>
  <input class="form-control" type="file" id="formFile"name="filetoupload"required>
</div>
  <button type="submit"name="submit"value="save" class="btn btn-primary fw-bold fs-5">Save</button>
</form>

</div>
</body>
</html>