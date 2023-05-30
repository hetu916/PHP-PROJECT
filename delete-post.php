<?php
$conn = mysqli_connect("localhost", "root", "", "project") or die("not run");
$post_id = $_GET['id'];
$cat_id = $_GET['catid'];
$sql = "DELETE FROM post WHERE post_id={$post_id};";
$sql .= "UPDATE category SET post=post - 1 WHERE category_id={$cat_id}";
if (mysqli_multi_query($conn, $sql)) {
    header("Location: http://localhost/hetal/project/post.php");
} else {
    echo "failed";
}



?>