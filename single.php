<?php
include'header3.php';

?>
<div class="row d-flex  p-5 border-top border-light border-4">
    <div class="col-3">
        <?php
  $conn = mysqli_connect("localhost", "root", "", "project") or die("not run");
  $post_id=$_GET['id'];
 $sql="SELECT post.post_id,post.title,post.description,post.post_date,category.category_name,user.username,post.category FROM post
  LEFT JOIN category ON post.category=category.category_id
  LEFT JOIN user ON post.author=user.user_id 
WHERE post.post_id={$post_id} ";
 
  $result=mysqli_query($conn,$sql)or die("unsussesfull");

  if(mysqli_num_rows($result)>0){
     while ($row=mysqli_fetch_assoc($result)) { 

                ?>

        <h4 class="text-primary"><a
                href="single.php?id=<?php echo $row['post_id'];  ?>"><?php echo $row['title'];  ?></a></h4>
        <div>
            <ul class="d-flex list-unstyled m-0">
                <li class="text-decoration-none">
                    <img src="news/images/tag.png" height="15px">
                    <span><?php echo $row['category_name'];  ?></span>
                </li>
                <li class="ps-2">
                    <img src="news/images/user.png" height="15px">
                    <span><a
                            href='category.php?cid=<?php echo $row['category'];  ?>'><?php echo $row['username'];  ?></a></span>
                </li>
                <li class="ps-2">
                    <img src="news/images/calendar.png" height="15px">
                    <span><?php echo  $row['post_date']?></span>
                </li>
            </ul>
        </div>
        <div class="p-3 "><img src="news/images/free.jpg" height="150px" class="border border-3"></div>

        <div class="p-3">

            <p><?php echo $row['description']; ?></p>
            <a class='read-more pull-right' href='single.php'>Read more</a>
        </div>
        <?php
    }
}
?>
    </div>
    <?php
include'sidebar.php';
?>
</div>