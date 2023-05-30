<?php
include 'header2.php';

?>

<div class="row d-flex justify-content-around  ">
  <h3 class="col-1 m-4">All Post </h3>
  <input type="button" id="load-button" value="load data">
  <a href='add-post.php' type="button"
    class="col-1 d-flex justify-content-center align-items-center  btn btn-primary m-4">Add post</a>
</div>
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
$limit = 3;

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$offset = ($page - 1) * $limit;

$sql = "SELECT post.post_id,post.title,post.description,post.post_date,category.category_name,user.username,post.category FROM post
 LEFT JOIN category ON post.category=category.category_id
 LEFT JOIN user ON post.author=user.user_id 

 ORDER BY post.post_id  LIMIT {$offset},{$limit}";

$result = mysqli_query($conn, $sql) or die("unsussesfull");

if (mysqli_num_rows($result) > 0) {

  ?>
  <table class="table container">
    <thead class="table-secondary">

      <tr id="table-data">
        <th scope="col">id</th>
        <th scope="col">Title</th>

        <th scope="col">Category</th>
        <th scope="col">Date</th>
        <th scope="col">Author</th>
        <th scope="col">Action</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <th scope="row">
            <?php echo $row['post_id']; ?>
          </th>
          <td>
            <?php echo $row['title']; ?>
          </td>
          <td>
            <?php echo $row['category_name']; ?>
          </td>
          <td>
            <?php echo $row['post_date']; ?>
          </td>
          <td>
            <?php echo $row['username']; ?>
          </td>

          <td class="edit"><a href="update-post.php?id=<?php echo $row['post_id']; ?>" class="btn btn-primary mx-4"
              type="button">Edit</a></td>
          <td class="delete"><a
              href="delete-post.php?id=<?php echo $row['post_id']; ?>&zcatid=<?php echo $row['category']; ?>"
              class="btn btn-primary mx-4" type="button">Delete</a>
            <?php $row['post_id']; ?>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  <?php
}



$sql1 = "SELECT* FROM user";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {

  $total_records = mysqli_num_rows($result1);


  $total_page = ceil($total_records / $limit);
  echo ' <ul class="pagination justify-content-center">';
  if ($page > 1) {
    echo ' <li class="page-item ">
 <a class="page-link" href="post.php?page=' . ($page - 1) . '" tabindex="-1" aria-disabled="true">Previous</a>
 </li>';
  }

  for ($i = 1; $i <= $total_page; $i++) {

    if ($i == $page) {

    }
    echo ' <li class="page-item"><a class="page-link" href="post.php?page=' . $i . '">' . $i . '</a></li>';
  }
  if ($total_page > $page) {
    echo '<li class="page-item">
   <a class="page-link" href="post.php?page=' . ($page + 1) . '">Next</a>
 </li>';
  }

  echo '</ul>';
}


?>
<script>
  $(document).ready(function () {
    $()
  });
</script>
</body>

</html>