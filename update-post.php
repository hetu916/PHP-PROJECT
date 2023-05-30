<?php
include 'header2.php';
?>
<div class="container mt-5 p-5 border-0 rounded w-50 " style="background-color: #e3f2fd">
  <h3 class="pb-4">Update post</h3>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "project") or die("not run");
  $post_id = $_GET['id'];



  $sql = "SELECT post.post_id,post.title,post.description,post.post_img,category.category_name ,post.category FROM post
 LEFT JOIN category ON post.category=category.category_id
 LEFT JOIN user ON post.author=user.user_id 
 WHERE post.post_id='{$post_id}'";

  $result = mysqli_query($conn, $sql) or die("unsussesfull");

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {


  ?>
  <form action="save-update-post.php" method="post" enctype="multipart/form-data">
    <div class="mb-3 ">
      <label for="" class="form-label fw-bold fs-5">title</label>
      <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">
      <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp">

    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label fw-bold fs-5"> description</label>
      <textarea class="form-control" name="postdesc" id="exampleFormControlTextarea1"
        rows="3"><?php echo $row['description']; ?></textarea>
    </div>
    <select class="form-select" aria-label="Default select example" name="category">
      <label>Category</label>
      <option value="1">select </option>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "project") or die("conn failed");
      $sql1 = "SELECT* FROM category";
      $result1 = mysqli_query($conn, $sql1) or die("unsussesfull");
      if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
          if ($row['category'] == $row1['category_id']) {
            $selected = "selected";
          } else {
            $selected = "";
          }
          echo "<option {$selected} value='{$row1['category_id']}'> {$row1['category_name']}</option>";


        }
      }
      ?>


    </select>
    <input type="hidden"name="old_category"value="<?php echo $row['category']; ?>" >
    <div class="mb-3">
      <label for="formFileSm" class="form-label fw-bold fs-5">post image</label>
      <input class=" form-control-sm" id="formFileSm" type="file" name="new-image">
    
      echo '<img src="upload/<?php echo $row['post_img']; ?>" height="150px">';
      <input type="hedden" name="old-img" value="<?php echo $row['post_img']; ?>">


    </div>

    <button type="submit" value="update" name="submit" class="btn btn-primary fw-bold fs-5">Update</button>
  </form>
  <?php
    }
  }



  ?>
</div>
</body>

</html>